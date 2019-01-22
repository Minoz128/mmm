<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-22
 * Time: 21:10
 */

namespace app\index\model;
use think\Model;

class AuthRule extends Model{
    public function getAllData($nid=0){
        $condition = [
            'nid' => $nid,
        ];
        $order = [
            'id ' => 'desc'
        ];
        return $this->where($condition)->order($order)->select();
    }

    public function checkRepeatName($name){
        $condition = [
            'name' => $name
        ];
        return $this->where($condition)->select();
    }

    public function checkRepeatTitle($title){
        $condition = [
            'title' => $title
        ];
        return $this->where($condition)->select();
    }

    public function checkRepeatUnlessSeifId($id,$name,$title){
        return $this->query('select * from m_auth_rule where (name="{$name}" or title="{$title}") and (id <> "{$id}")');
    }
}