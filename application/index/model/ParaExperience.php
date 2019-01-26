<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-24
 * Time: 23:34
 */
namespace app\index\model;
use think\Model;

class ParaExperience extends Model{
    public function getAllData(){
        return $this->select();
    }

    //添加数据入库
    public function insertdata($id,$insert,$type){
        $sql = "insert into m_para_experience (pic_id,tags,brief_id) values ({$id},'{$insert}',$type)";
        return $this->execute($sql);
    }

    //清空表中所有数据
    public function truncateAllData(){
        return $this->execute("truncate table m_para_experience");
    }
}