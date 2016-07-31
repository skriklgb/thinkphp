<?php
/**
 * 主要功能：
 * @authors: SkrikLgb
 * Date: 2016/7/31 14:11
 */
namespace Home\Model;

use Think\Model;

class UserModel extends Model{
    //重新定义表前缀
//    protected $tablePrefix = 'abc_';

//重新定义表名
//    protected $tableName = 'abc';

//重新定义完整的带前缀的表名
//    protected $trueTableName = 'tp_abc';

    //附加数据库名
//    protected $dbName = 'tp';
    public function __construct()
    {
        parent::__construct();
        echo "home";
    }
}