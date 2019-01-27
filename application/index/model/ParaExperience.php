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
        $date = date('Y-m-d H:i:s');
        $sql = "insert into m_para_experience (pic_id,tags,brief_id,date) values ({$id},'{$insert}',{$type},'{$date}')";
        return $this->execute($sql);
    }

    //清空表中所有数据
    public function truncateAllData(){
        return $this->execute("truncate table m_para_experience");
    }

    //从表中找出所有与picid关联的数据
    public function getRelateData($picid){
        $sql = "SELECT b.id AS id,a.src AS src,b.tags AS tag,c.brief AS brief,b.tag_by_man AS tag_by_man,a.type AS type FROM m_pic AS a LEFT JOIN m_para_experience AS b ON a.id = b.pic_id LEFT JOIN m_parameter AS c ON c.id = b.brief_id WHERE a.id = {$picid} ORDER BY b.date DESC";
        return $this->query($sql);
    }

    //查找一条数据 并关联m_pic的type
    public function getDataByPicid($id){
        $sql = "select a.*,b.type as type from m_para_experience as a left join m_pic as b on a.pic_id=b.id where a.id={$id}";
        return $this->query($sql);
    }
}