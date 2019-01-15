<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-07
 * Time: 22:31
 */

namespace app\index\model;
use think\Model;

class AuthGroupAccess extends Model{
    public function check($data){
        $condidion = [
            'username' => $data['username'],
            'password' => $data['password']
        ];
        return $this->where($condidion)->select();
    }

    /**
     * @param int $id id=0时候为添加时 查询整个数据库username字段
     * id 传递参数 >0时候 查询整个数据库除了本id之外其他username字段
     * @param $username
     * @return false|mixed|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\BindParamException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     * 查重
     */
    public function checkRepeat($uid=0,$username){
        if($uid == 0){
            $condidion = [
                'username' => $username
            ];
            return $this->where($condidion)->select();
        }else if($uid > 0){
            return $this->query("select * from m_auth_group_access where username='{$username}' and uid <> {$uid}");
        }

    }

    public function updateData($groupid,$status){
        return $this->execute("update m_auth_group_access set status={$status} where group_id={$groupid}");
    }

    public function getDataByGroupId($groupid){
        return $this->query("select * from m_auth_group_access where group_id={$groupid}");
    }

    public function updateDataByUid($uid,$status){
        return $this->execute("update m_auth_group_access set status={$status} where uid={$uid}");
    }

    public function del($groupid){
        $condition = [
            'group_id' => $groupid
        ];
        return $this->where($condition)->delete();
    }

    public function getAllData(){
        return $this->select();
    }

    public function delUser($uid){
        $condition = [
            'uid' => $uid
        ];
        return $this->where($condition)->delete();
    }
}