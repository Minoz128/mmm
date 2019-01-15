<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019/1/10
 * Time: 11:53
 */

namespace app\index\model;
use think\Model;

class Base extends Model{
    public function getAllData(){
        return $this->select();
    }
}