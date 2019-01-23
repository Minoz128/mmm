<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-23
 * Time: 20:23
 */

namespace app\index\model;
use think\Model;

class Parameter extends Model{
    public function getAllData(){
        return $this->select();
    }


}