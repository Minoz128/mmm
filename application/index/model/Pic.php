<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-04
 * Time: 23:07
 */

namespace app\index\model;
use think\Model;

class Pic extends Model{
    public function getAllData($str){
        return $this->query("select * from m_pic where {$str} order by id desc");
    }

    public function reset0(){
        return $this->execute("update m_pic set status=0,tag=null,resulterr=null");
    }

    public function selectByWhere($where){
        return $this->query("select count(*) as count from m_pic where {$where}");
    }

    public function trundata(){
        return $this->execute("truncate table m_pic");
    }

    public function updateData($id,$insertTag){
        return $this->execute("update m_pic set tag='{$insertTag}' where id={$id}");
    }
}