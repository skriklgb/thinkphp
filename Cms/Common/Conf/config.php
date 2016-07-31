<?php
return array(
	//'配置项'=>'配置值'
/*    //禁止访问模块
    'MODULE_DENY_LIST' => array('Common','Runtime'),  //默认就禁止访问的，当你去掉数组里的'Common'，那么会提示：“无法加载控制器:Index”的错误信息。说明这个模块已经可以访问了。
//允许访问的模块，设置了，就必须写全，漏写的将无法访问
    'MODULE_ALLOW_LIST' => array('Home','Admin'),
    //设置默认起始模块
    'DEFAULT_MODULE' => 'Home',   //默认是Home
    //单模块设置  false:单模块
    'MULTI_MODULE' => true,*/

    //设置PATHINFO 模式下键值对分隔符    http://localhost/thinkphp/index.php/Home_User_test_user_less_pass_123
//    'URL_PATHINFO_DEPR'=>'_',

//修改键名称      http://localhost/thinkphp/index.php?mm=Home&cc=User&aa=test&user=less&pass=123
//    'VAR_MODULE' => 'mm',
//    'VAR_CONTROLLER' => 'cc',
//    'VAR_ACTION' => 'aa',

//全局配置定义
    'DB_TYPE'=>'mysql', //数据库类型
    'DB_HOST'=>'localhost', //服务器地址
    'DB_NAME'=>'thinkphp', //数据库名
    'DB_USER'=>'root', //用户名
    'DB_PWD'=>'', //密码
    'DB_PORT'=>3306, //端口
    'DB_PREFIX'=>'think_', //数据库表前缀

//PDO专用定义
/*    'DB_TYPE'=>'pdo', //数据库类型
    'DB_USER'=>'root', //用户名
    'DB_PWD'=>'', //密码
    'DB_PREFIX'=>'think_', //数据库表前缀
    'DB_DSN'=>'mysql:host=localhost;dbname=thinkphp;charset=UTF8',*/

    //页面Trace，调试辅助工具
    'SHOW_PAGE_TRACE' =>true,
);