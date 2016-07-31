<?php
/**
 * 主要功能：
 * @authors: SkrikLgb
 * Date: 2016/7/31 16:39
 */
namespace Home\Controller;

use Think\Controller;
use Think\Model;

class SqlController extends Controller{
    /*
     * 1.使用字符串作为条件查询
     */
    public function string(){
        $user = M('User');
        var_dump($user-> where('id=1')->select());
    }

    /*
     * 2.使用索引数组作为查询条件:  推荐
     */
    public function conditionarray(){
        $user = M('user');
        $condition['id'] = 1;
        $condition['user'] = '哪吒';
        $condition['_logic'] = 'OR';    //索引数组查询的默认逻辑关系是AND，如果想改变为OR，可以使用_logic 定义查询逻辑。
        var_dump($user->where($condition) ->select());
    }

    /*
     * 3.使用对象方式来查询
     */
    public function condition(){
        $user = M('User');
        $condition = new \stdClass();   //'\'是将命名空间设置为根目录
        $condition->id =1;
        $condition ->user = '哪吒';
        $condition->_logic ='OR';
        var_dump($user->where($condition) ->select());
    }

    /*
     * 二．表达式查询:使用索引数组作为查询条件
     * 查询表达式格式：$map['字段名'] = array('表达式','查询条件');
     */
    public function map(){
        $user = M('User');
//        $map['id'] = array('eq',1);  //EQ：等于(=)  where 为id=1
//        $map['id'] = array('neq',1);   //NEQ：不等于(<>)   where 为id<>1

//        $map['id'] = array('gt',1);    //GT：大于(>)     where 为id>1
//        $map['id'] = array('egt',1);    //EGT：大于等于(>=)     where 为id>=1

//           $map['id'] = array('lt',2);     //LT：小于(<)     where 为id<1
//        $map['id'] = array('elt',2);     //ELT：小于等于(<=)   where 为id<=1

//        $map['user'] = array('like','%小%');     //[NOT]LIKE：模糊查询     where 为like %小%
//        $map['user'] = array('notlike','%小%');     //[NOT]LIKE：模糊查询    //where 为not like %小%
//        $map['user'] = array('like',array('%小%','%一%'),'OR'); //[NOT]LIKE：模糊查询的数组方式

//        $map['id'] = array('between','1,3');  //[NOT] BETWEEN：区间查询
//        $map['id'] = array('not between','1,3');   //[NOT] BETWEEN：区间查询
//         $map['id'] = array('in','1,2,4');    //[NOT] IN：区间查询
//         $map['id'] = array('not in','1,2,4');    //[NOT] IN：区间查询

//        $map['id'] = array('exp','in (1,2)');   //EXP：自定义
//        $map['id'] = array('exp', '=1');
//        $map['user'] = array('exp', '="蜡笔小新"');
//        $map['_logic'] = 'OR';    //EXP：自定义增加OR 语句
        $map['id'] = array('exp','<3');
        var_dump($user->where($map) ->select());

    }

    /*
     * 三．快捷查询
     * 快捷查询方式是一种多字段查询的简化写法，在多个字段之间用'|'隔开表示OR，用'&'隔开表示AND。
     */
    public function quick(){

        $user = M('User');
//        $map['user|email'] = '哪吒'; //'|'换成'&'变成AND;   //1.不同字段相同查询条件
//        $map['id&user'] = array(1,'蜡笔小新','_multi'=>true);    //2.使用不同查询条件   PS：设置'_multi'为true，是为了让id 对应1，让user 对应'蜡笔小新'，否则就会出现id 对应了1 还要对应'蜡笔小新'的情况。而且，这设置要在放在数组最后。
        $map['id&user'] = array(array('gt', 0),'蜡笔小新','_multi'=>true);    //3.支持使用表达式结合快捷查询
        var_dump($user->where($map)->select());
    }

/*
 * 四．区间查询
 */
public function interval(){
        //区间查询
    $user = M('User');
//    $map['id'] = array(array('gt', 1), array('lt', 4));
    $map['id'] = array(array('gt', 1), array('lt', 4), 'OR');  //第三个参数设置逻辑OR
    var_dump($user->where($map)->select());
}

    /*
     *五．组合查询
     */
    public function combination(){
        //字符串查询(_string)
/*        $user = M('User');
        $map['id'] = array('eq', 1);
        $map['_string'] ='user="蜡笔小新" AND email="xiaoxin@163.com"';
        var_dump($user->where($map)->select());*/

        //请求字符串查询(_query)
/*        $user = M('User');
        $map['id'] = array('eq', 1);
        $map['_query'] ='user=蜡笔小新&email=xiaoxin@163.com&_logic=OR';
        var_dump($user->where($map)->select());*/

        //复合查询(_complex)
        $user = M('User');
        $where['user'] = array('like', '%小%');
        $where['id'] = 1;
        $where['_logic'] = 'OR';
        $map['_complex'] = $where;
        $map['id'] = 3;
        $map['_logic'] = 'OR';
        var_dump($user->where($map)->select());

    }

    /*
     * 六．统计查询
     */
    public function count(){
        //数据总条数
        $user = M('User');
        var_dump($user->count());

        //字段总条数，遇到NULL不统计
        var_dump($user->count('email'));

        //最大值
        var_dump($user->max('id'));

        //最小值
        var_dump($user->min('id'));

        //平均值
        var_dump($user->avg('id'));

        //求总和
        var_dump($user->sum('id'));
    }

    /*
     * 七．动态查询
     */
    public function getby(){
        //查找email=xiaoin@163.com的数据
        $user = M('User');
        var_dump($user->getByemail('xiaoxin@163.com'));

        //通过user得到相对应id值
        var_dump($user->getFieldByUser('哪吒', 'id'));
    }

    /*
 * 八．SQL 查询
 */
    public function sql(){
        //查询结果集，如果采用分布式读写分离，则始终在读服务器执行
        $user = M('User');
        var_dump($user->query('SELECT * FROM think_user'));

        //更新和写入，如果采用分布式读写分离，则始终在写服务器执行
        var_dump($user->execute('UPDATE think_user set user="蜡笔大新" WHERE id=1'));

        var_dump($user->query('SELECT * FROM think_user'));
    }

}
