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


}
