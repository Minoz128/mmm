<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019/1/10
 * Time: 11:12
 */
namespace app\index\model;
use think\Model;

class Tagbase extends Model{

    public function getAllDataByNid($nid){
        return $this->query("select * from m_tagbase where nid={$nid}");
    }

    public function checkRepeat($tagname){
        $condition = [
            'tagname' => $tagname
        ];
        return $this->where($condition)->select();
    }

    /**获取一堆数据的根节点
     * @param $connectbaseid
     * @return mixed
     * @throws \think\db\exception\BindParamException
     * @throws \think\exception\PDOException
     */
    public function getRoot($connectbaseid){
        return $this->query("select * from m_tagbase where connectbaseid={$connectbaseid} and no != ''");
    }


    public function getOrigin($rootid,$connectbaseid){
        return $this->query("select * from m_tagbase where id!={$rootid} and connectbaseid={$connectbaseid}");
    }
}