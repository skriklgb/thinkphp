<?php
/**
 * 主要功能：
 * @authors: SkrikLgb
 * Date: 2016/7/31 16:07
 */
namespace Admin\Model;

use Think\Model;

class UserModel extends Model{
    public function __construct()
    {
        parent::__construct();
        echo "Admin";
    }
}