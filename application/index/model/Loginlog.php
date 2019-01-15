<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-10
 * Time: 23:09
 */
namespace app\index\model;
use think\Model;

class Loginlog extends Model{
    public function getAllData(){
        return $this->select();
    }
}