<?php
/*
 * 控制器类的命名方式：控制器名（驼峰式，首字母大写）+Controller
 * 控制器文件的命名方式：类名+class.php
 * 创建一个控制器需要三个部分：1.设置命名空间；2.导入命名空间；3.控制器类
 * 完整形式:http://localhost/thinkphp/index.php/Home/Index/index
 * 在这里的完整URL中，index.php是单一入口文件，Home是主模块，Index是控制器名，index是控制器里的一个方法。注意：这里大小写区分，因为在Linux是区分大小写的。
 */

namespace Home\Controller; //设置命名空间，就是当前目录
use Think\Controller;   //继承父类用到Controller类

//控制器类
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function test(){
        echo"hello";
    }
}