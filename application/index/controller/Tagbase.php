<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019/1/10
 * Time: 11:10
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Exception;
use think\Validate;

class Tagbase extends Controller{
    /**
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 展示页面
     */
    public function index(){
        $connectbaseid = input('get.connectbaseid',1,'intval');
        $nid = input('get.nid',0,'intval');

        $root = Db::name("tagbase")->where('connectbaseid','eq',$connectbaseid)
                ->where('nid','eq',0)
                ->find();

        $root = $nid>0?$nid:$root['id'];//根节点nid
        $tag = $nid==0?0:1; //控制查阅关闭状态

        $data = model('Tagbase')->getAllDataByNid($root);
        $tagType = model('Base')->getAllData();
        return $this->fetch('',[
            'data' => $data,
            'tagType' => $tagType,
            'count' => count($data),
            'connectbaseid' => $connectbaseid,
            'tag' => $tag
        ]);
    }

    /**
     * @return mixed添加父节点
     */
    public function addparenttag(){
        if(request()->isPost()){
            $data = input('post.');
            //查重
            $res = model('Tagbase')->checkRepeat($data['tagname']);
            if($res){
                return show(0,'该标签组名称已存在，请更换');
            }
            //验证数据合法
            if(!Validate('Tagbase')->scene('add')->check($data)){
                return show(0,Validate('Tagbase')->getError());
            };
            //数据入库
            try{
                $realnode = Db::name('Tagbase')->where('connectbaseid','eq',$data['connectbaseid'])
                            ->where('nid','eq',0)->find();
                $realnode = $realnode['id'];
                $data['status'] = 1;
                $data['nid'] = $realnode;
                $result = model('Tagbase')->save($data);
                if($result){
                    return show(1,"添加成功");
                }else{
                    return show(0,"添加失败");
                }
            }catch (Exception $e){
                return show(0,$e->getMessage());
            }

        }else{
            $tagType = model('Base')->getAllData();
            return $this->fetch('',[
                'tagType' => $tagType,
            ]);
        }
    }


    /**
     * @return mixed添加子节点
     */
    public function addsontag(){
        if(request()->isGet()){
            $id = input('get.id');
            if(is_numeric($id)){
                $data = model('Tagbase')->get($id);
            }
            return $this->fetch('',[
                'data' => $data,
                'connectbaseid' => $data['connectbaseid']
            ]);
        }else if(request()->isPost()){
            $data = input('post.');
            //查重
            $res = model('Tagbase')->checkRepeat($data['tagname']);
            if($res){
                return show(0,'该标签名称已存在，请更换');
            }
            //验证数据合法
            if(!Validate('Tagbase')->scene('addson')->check($data)){
                return show(0,Validate('Tagbase')->getError());
            };
            //数据入库
            try{
                $result = model('Tagbase')->save($data);
                if($result){
                    return show(1,"添加成功");
                }else{
                    return show(0,"添加失败");
                }
            }catch (Exception $e){
                return show(0,$e->getMessage());
            }

        }
    }

    /**
     * 修改状态
     */
    public function tagstatus(){
        $status = input('get.status');
        $id = input('get.id');
        if(is_numeric($status) && $id>0){
            $result = model('Tagbase')->save(['status'=>$status],['id'=>$id]);
            if($result){
                $this->success("状态更新成功");
            }else{
                $this->error("状态更新失败");
            }
        }else{
            $this->error("状态标识不合法");
        }
    }

    /**
     * 来自图片上传接口 根据connectbaseid获取所有数据
     */
    public function getinfo(){
        if(request()->isPost()){
            $connectbaseid = input('post.id');
            if(is_numeric($connectbaseid)){
                //获取数据堆中的根节点 no不为空 connectbaseid传递
                $root = model('Tagbase')->getRoot($connectbaseid);
                $rootid = $root[0]['id'];
                $data = model('Tagbase')->getOrigin($rootid,$connectbaseid);
                $tree = [];
                //筛选父节点
                foreach ($data as $key=>$value){
                    if($value['nid'] == $rootid){
                        $tree[] = $value;
                    }
                }

                //组装父子关系一一对应的数据
                foreach ($tree as $treeKey=>$treeValue){
                    foreach ($data as $resultKey=>$resultValue){
                        if($resultValue['nid'] == $treeValue['id']){
                            $tree[$treeKey]['children'][] = $resultValue;
                        }
                    }
                }

                //最后一次 清除所有子节点为空的数据
                $result = [];
                foreach ($tree as $resultKey=>$resultValue){
                    if(isset($resultValue['children'])){
                        $result[] = $resultValue;
                    }
                }

                echo json_encode($result);
            }
        }
    }
}