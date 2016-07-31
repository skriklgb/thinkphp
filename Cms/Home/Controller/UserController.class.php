<?php
/**
 * 主要功能：
 * @authors: SkrikLgb
 * Date: 2016/7/31 9:04
 */
namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;
//use Think\Model;

class UserController extends Controller{
    public function index(){
        echo "User模块index方法";
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

    public function  model(){
//        $user= new Model('user');
//        $user = new Model('user','think_','mysql://root:@localhost/thinkphp');   //当某些地方需要用到连接外部数据库的时候会用到这种方式
        //实例化Model类
//        $user = M('user');    //此种方法不用导入use Think\Model;
//        var_dump($user->select());
        $user = new UserModel();
        var_dump($user->select());
    }
}