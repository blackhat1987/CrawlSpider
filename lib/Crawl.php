<?php

/**
* PHP Crawl Spider
* version v1.0
* author Johnsneaker
* DateTime 2015/05/07
*
*       _       _            _____                  _             
*      | |     | |          / ____|                | |            
*      | | ___ | |__  _ __ | (___  _ __   ___  __ _| | _____ _ __ 
*  _   | |/ _ \| '_ \| '_ \ \___ \| '_ \ / _ \/ _` | |/ / _ \ '__|
* | |__| | (_) | | | | | | |____) | | | |  __/ (_| |   <  __/ |   
*  \____/ \___/|_| |_|_| |_|_____/|_| |_|\___|\__,_|_|\_\___|_|   
*                                                                 
*
*/


class Crawl
{
	/*配置文件*/
	public $config = array();
	
	/*网站应用名称*/
	public $appName = '';

	/*页面深度*/
	public $deep = 1;

	/*当前页面*/
	public $currPage_url = '';

	/*上一页*/
	public $prePage_url = '';

	/*下一页*/
	public $nextPage_url = '';

	/*URi 参数*/
	public $query_param = '';

	/*查询几组参数*/
	private $_query_item = 0;

	public $errorMsg = null;

	/*curl setopt*/
	static $proxy = false;

	static $conn_num = 1;

	static $max_conn = 5;

	public function __construct($appName, $config)
	{
		$this->appName = $appName;
		$this->config = $config[$appName];
		$this->_query_item = count($config['get']);

	}

	public function crawl()
	{
		error_log("采集信息:" . PHP_EOL);
		error_log("站点:" . $this->appName . PHP_EOL);
		error_log("是否多个查询参数:" . count($this->config['get']) . PHP_EOL);

		if(isset($this->config['get'])) {
			foreach ($this->config['get'] as $key => $value) {
				error_log("参数:" . json_encode($this->config['get']) . PHP_EOL);
				$this->query_param = (!empty($value))? '?' . http_build_query($value):'';
				$this->crawl_page();
				$this->deep = 1;
			}
		} else {
			$this->crawl_page();
		}

		error_log("查询完毕！！！");
	}

	public function crawl_page($prePage_url = '')
	{
		$dataList = array();
		$this->prePage_url = $prePage_url;
		$this->currPage_url = $this->config['url'] . $this->query_param;
		$html = $this->get_html();

		if($this->hasError()) {
			print_r($this->getError());exit();
			return false;
		}
	    $dom = new DOMDocument('1.0');
        @$dom->loadHTML($html);
	    $xpath = new DOMXPath($dom);

	    /*爬取当前页内容*/
	    $elements = $xpath->query($this->config['xpath']['main']);
	    if($elements->length == 0) {
	    	//尝试走代理
	    	if(self::$conn_num <= self::$max_conn) {
	    		$this->reconnect();
	    	} else {
		    	$this->setError("抓取错误,请检查代理ip或配置文件");
	    		return false;
	    	}

	    }
	    error_log("######第" . $this->deep . "页########");

	    foreach ($elements as $key => $element) {
	    	error_log($element->textContent . PHP_EOL);
	        $dataList[$key]['title'] = $element->textContent;
	        $dataList[$key]['href'] = $element->getAttribute("href");
	    }


	    if(isset($this->config['sleep'])) {
	    	sleep($this->config['sleep']);
	    }

	    /*获取下一页Url*/
	    $this->nextPage_url = $xpath->query($this->config['xpath']['next'])
	    			 		  ->item(0)
    			 			  ->getAttribute('href');

	    if(!$this->checkIsEnd()) {
			$this->query_param = str_replace($this->config['url'], '', $this->nextPage_url);
	    	$this->deep++;
	    	//$this->config['query_url'] = $this->config['url'] . $this->nextPage_url;
	    	$this->crawl_page($this->currPage_url);
	    } else {
	    	echo "End" . PHP_EOL;
	    }
	    
  		$filename = $this->appName . '-' . date('Ymd',time()) . '.json';
  		//file_put_contents('/tmp/' . $filename, json_encode($dataList), FILE_APPEND);
	}

	private function reconnect()
	{
		error_log("没有抓取到东西!(被ban or 语句有问题),第" . self::$conn_num . "次尝试重连....");
		self::$conn_num++;
		static::$proxy = true;
		$this->crawl_page();	
	}
	public function get_html()
	{
        $options = array(
                CURLOPT_URL             => $this->currPage_url,
                CURLOPT_HEADER          => false,
                CURLOPT_FOLLOWLOCATION  => true,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_TIMEOUT         => 30,
                CURLOPT_USERAGENT       => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; ru; rv:1.8.0.9) Gecko/20061206 Firefox/1.5.0.9',
        );

        if(static::$proxy) {
        	$proxy = array(CURLOPT_PROXY => '107.170.238.246:82');
        	$options = $options + $proxy;
        }

        $ch = curl_init();
    	curl_setopt_array($ch, $options);
    	$content = curl_exec($ch);
    	if(curl_errno($ch) != 0) {
    		$this->setError(curl_error($ch));
    		return false;
    	}

    	return $content;
    	//return (!$error && $html) ? $html : null;
	}

	/*
	* 设置随机User-agent
	*
	*/
	public function getRandomUserAgent()
	{
		$lines = file(APP_PATH . '/config/user-agent.txt');
		return $lines[array_rand($lines)];
	}

	/* 获取proxyIP*/
	public function getProxyIp()
	{
		$lines = file(APP_PATH . '/config/true_proxy_ip.txt');
		return $lines[array_rand($lines)];
	}

	/*
	* 设置随机Stream
	*
	*/
	public function getRandomStream()
	{
		$auth = base64_encode("User:ROOT");
		$opt = array('http' => array(//'proxy' => 'tcp://'.$this->getProxyIp(),
									 'request_fulluri' => true,
									 //'header' => "Proxy-Authorization:Basic $auth",
									 'header' => 'Accept-language:en\r\n'.
									 			 'Cookie:test=test\r\n'.
                                                 'User-agent:'.$this->getRandomUserAgent().'\r\n'));

		return stream_context_create($opt);									 			 
	}

	public function hasError()
	{
		return !empty($this->errorMsg);
	}

	public function setError($msg)
	{
		$this->errorMsg = $msg;
	}

	public function getError()
	{
		$nowTime = date("Y-m-d H:i:s", time());
		return '['.$nowTime.'] ' . $this->errorMsg;
	}
	/*
	* 检查是否是最后一页
	*
	*
	*/
	public function checkIsEnd()
	{
		if($this->deep > 2) {
			error_log("到达最大页数".PHP_EOL);
			return true;
		}

		if($this->prePage_url == $this->nextPage_url) {
			error_log("已经是最后一页!");
			return true;
		}

		return false;
	}
}
