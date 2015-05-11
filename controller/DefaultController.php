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
}
