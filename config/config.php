<?php
/*爬虫配置文件*/

    return

    [
     'weixin' =>
    	[
    	 'url'   => 'http://weixin.sogou.com/weixin',
    	 'get'   => ['type' => 2, 'query' => '网贷','sourceid' => 'inttime_day','tsn' => 1],
    	 'sleep' => 2,
    	 'depth' => 1,
    	 'xpath' => ['main' => '//div[@class="results"]/div[@class="wx-rb wx-rb3"]/div[@class="txt-box"]/h4/a',
    	 			 'next' => '//div[@id="pagebar_container"]/a[@id="sogou_next"]'],
	  	],

	 'touzhijia' =>
	 	[
	 	  'url'  => 'http://www.touzhijia.com/project',
	 	  'xpath'=> ['main' => '//tbody/tr/td[@class="td2"]/p[1]',
	 	  			 'next' => '//div[@class="manu"]/a'],
	 	],

	 'wenda' =>
	 	[
	 	  'url'  => 'http://dev.touzhijia.net/wenda/',
	 	  'xpath'=> ['main' => '//tbody/tr/td/a',
	 	  			 'next' => '//div[@class="manu"]/a[last()]'],
	 	]
	];
