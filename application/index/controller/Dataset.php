<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019/1/26
 * Time: 10:51
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Exception;

class Dataset extends Controller{
    public function updatetags(){
        $allData = model('Pic')->getAllData("1=1");
        $allCount = count($allData);
        $status0Data = model('Pic')->selectByWhere("status='0'");
        $status0Count = $status0Data[0]['count'];
        $status1Data = model('Pic')->selectByWhere("status='1'");
        $status1Count = $status1Data[0]['count'];

        return $this->fetch('',[
            'allData' => $allData,
            'allCount' => $allCount,
            'status0Data' => $status0Data,
            'status0Count' => $status0Count,
            'status1Data' => $status1Data,
            'status1Count' => $status1Count,
        ]);
    }


    function updatetagsbyman(){
        $id = input('get.id');
        $onshow_status = input('get.onshow_status');
        if($id){
            $result = model("ParaExperience")->getRelateData($id);
            return $this->fetch('',[
                'result' => $result,
                'onshow_status' =>$onshow_status
            ]);
        }else{
            return $this->error("未获取到id");
        }
    }

    //添加人工标注页面
    function addmanmadetag(){
        $id = input('get.id');
        session("tags_SelectByMachine",null);
        $this->SelectByMachineSession();
        if (is_numeric($id)){
            $tag = model('ParaExperience')->getDataByPicid($id);
            $tag = $tag[0];
            if($tag){
                $type =$tag['type'];
                $tag = $tag['tags'];
                if(is_array(session("tags_SelectByMachine"))){
                    foreach(session("tags_SelectByMachine") as $key=>$value){
                        if($value['id'] == $type){
                            $tree = session("tags_SelectByMachine")[$key];
                        }
                    };

                    return $this->fetch('',[
                        'user' => session('user')[0]['username'],
                        'tag' => $tag,
                        'tree' => $tree,
                        'id' => $id
                    ]);
                }
            }
        }
    }

    /**
     * @return string
     * 如果不存在对应的session
     * 根据m_base和m_tagbase表关联组成一个大数组
     * 包含整个实验 => 母标签 => 子标签三级功能
     *
     * 保存进session的目的是一次生成 以后次次读取(维持持久化)
     * 不用每次进行动态分析时都去数据库查询
     *
     * 也可以用redis缓存数据
    */
    function SelectByMachineSession(){
        $base = Db::name('Base')->select();
        //最外层
        foreach($base as $key => $value){
            if(isset($value['no'])){
                $root = Db::name('Tagbase')->where('no','eq',$value['no'])->field('id')->find();
                foreach ($root as $rootKey=>$rootValue){
                    //标签组
                    $childrenByRoot = Db::name('Tagbase')->where('nid','eq',$rootValue)->select();
                    //母标签
                    foreach($childrenByRoot as $childrenKey=>$childrenValue){
                        $sonTags = Db::name('Tagbase')->where('nid','eq',$childrenValue['id'])->select();
                        $childrenByRoot[$childrenKey]['sonchildcounts'] = count($sonTags);
                        $list = [];
                        foreach($sonTags as $sonKey => $sonValue){
                            $list[] = $sonValue;
                        }
                        //母标签下子标签信息
                        $childrenByRoot[$childrenKey]['sonlists'] = $list;
                    }
                    $base[$key]['childrens'] = $childrenByRoot;
                }
            }
        }
        session("tags_SelectByMachine",$base);
        return "session_save_success";
    }

    function updateManMadeTags(){
        $data = input('post.');
        $id = $data['id'];
        if(!Validate("Pic")->scene("updateManMade")->check($data)){
            return show(0,Validate("Pic")->getError());
        }
        try{
            $data = [
                'tag_by_man'=>$data['manmadetags'],
                'editor_user'=>session('user')[0]['username']
            ];

            model('ParaExperience')->save($data,['id'=>$id]);
            model('Pic')->updateManMadeStatus($id);
        }catch (Exception $e){
            return show(0,$e->getMessage());
        }
        return show(1,"更新成功");
    }
}