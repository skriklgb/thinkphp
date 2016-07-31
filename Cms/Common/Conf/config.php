<?php
return array(
	//'配置项'=>'配置值'
    //禁止访问模块
    'MODULE_DENY_LIST' => array('Common','Runtime'),  //默认就禁止访问的，当你去掉数组里的'Common'，那么会提示：“无法加载控制器:Index”的错误信息。说明这个模块已经可以访问了。
//允许访问的模块，设置了，就必须写全，漏写的将无法访问
    'MODULE_ALLOW_LIST' => array('Home','Admin'),
    //设置默认起始模块
    'DEFAULT_MODULE' => 'Home',   //默认是Home
    //单模块设置  false:单模块
    'MULTI_MODULE' => true,
);