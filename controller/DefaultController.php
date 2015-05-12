<?php

/* 微信公众号文章爬虫
 * Author Johnsneaker
 * Date 2015/05/04
 */

class DefaultController
{
	public function actionIndex()
    {
    	$str = 'weixin';
        $config = include APP_PATH . '/config/config.php';
        $crawl = new Crawl($str, $config);
		$ret = $crawl->crawl();
		if(!$ret) {
			echo $crawl->getError();
		}

	}

	public function actionRead()
	{
		$file = 'weixin-' . date('Ymd') . '.json';
		$json = file_get_contents( '/tmp/' . $file);
		$data_arr = json_decode($json, true);
		foreach ($data_arr as $key => $value) {
			echo "<h1>$key:</h1></br>";
			foreach ($value as $k => $v) {
				echo $v['title'] . "</br>";
			}
		}
	}
}
