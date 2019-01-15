<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-08
 * Time: 20:40
 */
namespace app\index\model;
use think\Model;

class AuthGroup extends Model{
    public function getAllData(){
        $order = [
            'id' => 'asc'
        ];
        return $this->order($order)->select();
    }

    /**
     * @param $id 用户组id
     * @param $title 用户组名称
     * @return mixed
     * @throws \think\db\exception\BindParamException
     * @throws \think\exception\PDOException
     *
     */
    public function checkRepect($id,$title){
        return $this->query("select * from m_auth_group where title='{$title}' and id <> {$id}");
    }

    public function updatePost($postData,$id){
        $title = $postData['title'];
        $status = $postData['status'];
        return $this->execute("update m_auth_group set title='{$title}',status={$status} where id={$id}");
    }

    public function del($id){
        $condition = [
            'id' => $id
        ];
        return $this->where($condition)->delete();
    }

    //检查是否有此条数据
    public function checkHasId($id){
        $condition = [
            'id' => $id
        ];
        return $this->where($condition)->select();
    }

}