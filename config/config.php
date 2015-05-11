<?php
/*爬虫配置文件*/

    return

    array(
     'weixin' =>
    	array(
    	 'url'   => 'http://weixin.sogou.com/weixin',
    	 'get'   => array(
    	 				array('type' => 2, 'query' => '网贷','sourceid' => 'inttime_day','tsn' => 1),
    	 				array('type' => 2, 'query' => '投之家','sourceid' => 'inttime_day','tsn' => 1),
    				),
    	 'sleep' => 2,
    	 'depth' => 1,
    	 'xpath' => array('main' => '//div[@class="results"]/div[@class="wx-rb wx-rb3"]/div[@class="txt-box"]/h4/a',
    	 			 	  'next' => '//div[@id="pagebar_container"]/a[@id="sogou_next"]'),
	  	),

	 'touzhijia' =>
	 	array(
	 	  'url'  => 'http://www.touzhijia.com/project',
	 	  'xpath'=> array('main' => '//tbody/tr/tdarray(@class="td2")/parray(1)',
	 	  			 	  'next' => '//divarray(@class="manu")/a'),
	 	),

	 'wenda' =>
	 	array(
	 	  'url'  => 'http://www.touzhijia.com/wenda/',
	 	  'xpath'=> array('main' => '//tbody/tr/td/a',
	 	  			 	  'next' => '//div[@class="manu"]/a[last()]'),
	 	)
	);
