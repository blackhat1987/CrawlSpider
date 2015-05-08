<?php

class Proxy
{
	public $file = '';

	public function __construct()
	{
		$this->file = file(APP_PATH . '/config/rebroproxy-5000-095625062014.txt');
	}

	public function test()
	{
		for ($i=0; $i < count($this->file) - 1; $i++) { 
			$splited = explode(':', $this->file[$i]);
			if($con = @fsockopen($splited[0], $splited[1], $eroare, $eroare_str, 3)) {
				file_put_contents('true_proxy_ip.txt', $this->file[$i], FILE_APPEND);
				error_log("good:" . $this->file[$i] . PHP_EOL);
				fclose($con);
			} else {
				error_log("no thing");
			}
		}

	}


}
