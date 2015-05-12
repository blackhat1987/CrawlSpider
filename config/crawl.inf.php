<?php
/*爬虫配置文件*/

    return

    array(
     'weixin' =>
        array(
         'url'   => 'http://weixin.sogou.com/weixin',
         'get'   => array(
                        array('type' => 2, 'query' => '合贷盈','sourceid' => 'inttime_day','tsn' => 1),
                    /*
                        array('type' => 2, 'query' => '风投','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '融资','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => 'P2P','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '上市','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '私募','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '征信','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '网贷之家','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '网贷天眼','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '网贷天地','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '克拉博','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '腾讯 互联网金融','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '搜狐 互联网金融','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '新浪 互联网金融','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '腾讯 互联网金融','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '投之家','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '火球计划','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '金斧子','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '微财富','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '招财宝','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '合贷盈','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '凤凰金融','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '易融宝','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '搜易贷','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '高收益','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '盈盈理财','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '挖财','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '盈灿资产','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '诺亚财富','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '昌泽小额信贷类投资基金','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '宜信财富现金管理计划','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '盈灿科技','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '融都科技','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '贷齐乐','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '晓风科技','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '迪蒙','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '帝友','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '绿麻雀','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '中科柏诚','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '安硕信息','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '盈灿咨询','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '零壹财经','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '国培机构','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '棕榈树','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '金融城','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '京北金融','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '易观','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '贷出去','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '云征信','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '芝麻信用','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '上海资信','sourceid' => 'inttime_day','tsn' => 1),
                        array('type' => 2, 'query' => '腾讯征信','sourceid' => 'inttime_day','tsn' => 1),
                        */
                    ),
         'sleep' => 1,
         'depth' => 1,
         'xpath' => array('main' => '//div[@class="results"]/div[@class="wx-rb wx-rb3"]/div[@class="txt-box"]',
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
