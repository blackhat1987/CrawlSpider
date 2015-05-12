<?php
    $a = array('网贷'=>array(array('title'=>'t1'),array('title'=>'t1.1')));
    $b = array('网贷'=>array(array('title'=>'t2'),array('title'=>'t2.1')));
    print_r(array('网贷'=>array_merge($a['网贷'],$b['网贷'])));
    
