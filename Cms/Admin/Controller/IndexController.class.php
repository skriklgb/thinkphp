<?php
/*
 * 控制器类的命名方式：控制器名（驼峰式，首字母大写）+Controller
 * 控制器文件的命名方式：类名+class.php
 * 创建一个控制器需要三个部分：1.设置命名空间；2.导入命名空间；3.控制器类
 * 完整形式:http://localhost/thinkphp/index.php/Home/Index/index
 * 在这里的完整URL中，index.php是单一入口文件，Home是主模块，Index是控制器名，index是控制器里的一个方法。注意：这里大小写区分，因为在Linux是区分大小写的。
 */

namespace Admin\Controller; //设置命名空间，就是当前目录
use Think\Controller;   //继承父类用到Controller类

//控制器类
class IndexController extends Controller {
    public function index(){
        echo "这是后台模块";
    }

}