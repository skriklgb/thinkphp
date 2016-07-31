<?php
/**
 * 主要功能：
 * @authors: SkrikLgb
 * Date: 2016/7/31 9:04
 */
namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
    public function index(){
        echo "index";
    }
    public function test($user,$pass){
        echo "user=".$user."pass=".$pass;
        //PATHINFO模式
        //http://localhost/thinkphp/index.php/Home/User/test/user/less/pass/123     user=lesspass=123
        //Home 表示模块，User 表示控制器，test 表示方法，user/Lee 表示第一个键值对，pass/123 表示第二个键值对。
        //普通模式：http://localhost/thinkphp/index.php?m=Home&c=User&a=test&user=less&pass=123
        //或者           http://localhost/thinkphp/?m=Home&c=User&a=test&user=less&pass=123

        //去除了index.php    http://localhost/thinkphp/Home
    }
}