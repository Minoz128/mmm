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
        return $this->execute("update m_pic set status=0,tag=null,manmadetags=null,exec_num=0,resulterr=null");
    }

    public function selectByWhere($where){
        return $this->query("select count(*) as count from m_pic where {$where}");
    }

    public function trundata(){
        return $this->execute("truncate table m_pic");
    }

    public function updateData($id,$insertTag){
        return $this->execute("update m_pic set tag='{$insertTag}',status=1,exec_num=exec_num+1 where id={$id}");
    }

    public function updateManMadeStatus($id){
        return $this->execute("update m_pic set manmade_status=1 where id=(select pic_id from m_para_experience where id={$id})");
    }
}