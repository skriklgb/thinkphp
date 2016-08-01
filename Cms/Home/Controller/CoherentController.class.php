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
class CoherentController extends Controller {
    public function basic(){
        //连贯操作入门
        $user = M('User');
        var_dump($user->where('id in (1,2,3,4)')->order('date DESC')->limit(2)->select());
        //PS：这里的where、order 和limit 方法都是连贯操作方法，所以它们都能返回$user本身，可以互换位置。而select 方法不是连贯方法，需要放在最后，用以显示数据集。

        //数组操作
//        $user = M('User');
        var_dump($user->select(array('where'=>'id in (1,2,3,4)', 'limit'=>'2', 'order'=>'date DESC')));

        //CURD处理，CURD会在专门章节讲解
//        $user = M('User');
        var_dump($user->where('id=1')->find());
        var_dump($user->where('id=2')->delete());
    }

    public function method(){
        echo "====================================1.where方法=============================================<br/>";
/*1.where*/
        echo "-------------------字符串方式-----------------------------";
        //字符串方式
        $user = M('User');
        var_dump($user->where('id=1')->select());

        echo "-------------------索引数组方式-----------------------------";
        //索引数组方式
//        $user = M('User');
        $map['id'] = 1; //使用表达式array('eq', 1);
        var_dump($user->where($map)->select());

        echo "-------------------多次调用方式-----------------------------";
        //多次调用方式
//        $user = M('User');
        $map['id'] = array('eq', 1);
        var_dump($user->where($map)->where('user="蜡笔大新"')->select());





        echo "====================================2.order    order 用于对结果集排序=============================================<br/>";
        /*2.order    order 用于对结果集排序。*/

        echo "-------------------倒序-----------------------------";
        //倒序
//        $user = M('User');
//        $map['id'] = array('eq', 1);
        var_dump($user->order('id desc')->select()); //正序默认或ASC

        echo "-------------------第二排序-----------------------------";
        //第二排序
        var_dump($user->order('id desc,email desc')->select());    //PS：先按id 倒序，再按email 倒序

        echo "-------------------数组形式防止字段和mysql关键字冲突-----------------------------";
        //数组形式防止字段和mysql关键字冲突
//        $user = M('User');
        $map['id'] = array('eq', 1);
        var_dump($user->order(array('id'=>'DESC'))->select());





        echo "====================================3.feild   feild 方法可以返回或操作字段，可以用于查询和写入操作=============================================<br/>";
        /*3.feild   feild 方法可以返回或操作字段，可以用于查询和写入操作。*/
        echo "-------------------只显示id和user两个字段-----------------------------";
        //只显示id和user两个字段
//        $user = M('User');
        var_dump($user->field('id, user')->select());

        echo "-------------------使用SQL函数和别名-----------------------------";
        //使用SQL函数和别名
//        $user = M('User');
        var_dump($user->field('SUM(id) as count, user')->select());

        echo "-------------------使用数组参数结合SQL函数-----------------------------";
        //使用数组参数结合SQL函数
//        $user = M('User');
        var_dump($user->field(array('id','LEFT(user,3)'=>'left_user'))->select());

        echo "-------------------获取所有字段-----------------------------";
        //获取所有字段
        $user = M('User');
        var_dump($user->field()->select()); //可以传入*号，或者省略方法

        echo "-------------------用于写入----------------------------<br/>";
        //用于写入
        $user = M('User');
        $user->field('user,email')->create(); //CURD 将在专门的章节学习





        echo "====================================3.limit方法=============================================<br/>";
//        limit 方法主要用于指定查询和操作的数量
        echo "-------------------限制结果集数量-----------------------------";
//限制结果集数量
        $user = M('User');
        var_dump($user->limit(2)->select());

        echo "-------------------分页查询-----------------------------";
        //分页查询
        $user = M('User');
        var_dump($user->limit(0,2)->select()); //2,2、,4,2




        echo "====================================4.page方法=============================================<br/>";
//        page 方法完全用于分页查询。
//page分页
        $user = M('User');
        var_dump($user->page(1,2)->select()); //2,2、3,2



        echo "====================================5.table方法=============================================<br/>";
//        table 方法用于数据表操作，主要是切换数据表或多表操作。
        echo "-------------------切换数据表-----------------------------";
//切换数据表
        $user = M('User');
        var_dump($user->table('think_info')->select());

        echo "-------------------获取简化表名----------------------------";
//获取简化表名
        $user = M('User');
        var_dump($user->table('__USER__')->select()); //__INFO__尚可

        echo "-------------------多表查询-----------------------------";
//多表查询
        $user = M('User');
        var_dump($user->field('a.id,b.id')->table('__USER__ a,__INFO__ b')->select());

        echo "-------------------多表查询，使用数组形式避免关键字冲突-----------------------------";
//多表查询，使用数组形式避免关键字冲突
        $user = M('User');
        var_dump($user->field('a.id,b.id')->table(array('think_user'=>'a', 'think_info'=>'b'))->select());



        echo "====================================6.alias方法=============================================<br/>";
//        alias 用于设置数据表别名
//设置别名
        $user = M('User');
        var_dump($user->alias('a')->select());


        echo "====================================7.group方法=============================================<br/>";
//        group 方法通常用于对结合函数统计的结果集分组。

        //分组统计      PS：group 会在mysql 部分单独探讨。
        $user = M('User');
        var_dump($user->field('user,max(id)')->group('id')->select());



        echo "====================================8.having方法=============================================<br/>";
//        having 方法一般用于配合group 方法完成从分组的结果中再筛选数据。
//分组统计结合having    PS：having 会在mysql 部分单独探讨。
        $user = M('User');
        var_dump($user->field('user,max(id)')->group('id')->having('id>2')->select());



        echo "====================================9.comment方法=============================================<br/>";

//        comment 方法用于对SQL 语句进行注释
//SQL注释
        $user = M('User');
        var_dump($user->comment('所有用户')->select());


        echo "====================================10.join方法=============================================<br/>";
//        join 方法用于多表的连接查询。
//JOIN多表关联，默认是INNER JOIN
//        $user = M('User');
//        var_dump($user->join('think_user ON think_info.id = think_user.id')->select()); //__USER__和__INFO__代替
//RIGHT、LEFT、FULL
//        var_dump($user->join('think_user ON think_info.id = think_user.id','RIGHT')->select());


        echo "====================================11.union方法=============================================<br/>";
//        union 方法用于合并多个SELECT 的结果集
//合并多个SELECT结果集
        $user = M('User');
        var_dump($user->union("SELECT * FROM think_info")->select());




        echo "====================================12.distinct方法=============================================<br/>";
//        distinct 方法用于返回唯一不同的值
//返回不重复的列
        $user = M('User');
        var_dump($user->distinct(true)->field('user')->select());





        echo "====================================13.cache方法=============================================<br/>";
//        cache 用于查询缓存操作    PS：第一次查询数据库，第二次查询相同的内容直接调用缓存，不用再查询数据库。
//查询缓存，第二次读取缓存内容
        $user = M('User');
        var_dump($user->cache(true)->select());
    }

}