<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-23
 * Time: 20:24
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Exception;

class Parameter extends Controller{
    //查看参数表结构
    public function index(){
        $tablefields = Db::query("SHOW FULL COLUMNS FROM "."m_parameter");
        return $this->fetch('',[
            'tablefields' => $tablefields,
        ]);
    }

    //添加参数页面以及实现逻辑
    public function add(){
        if(request()->isPost()){
            $data = input('post.');
            if(!Validate('Parameter')->scene('add')->check($data)){
                return show(0,Validate('Parameter')->getError());
            }
            $para = $data['parameter'];
            $type = $data['type'];
            $comment = $data['comment'];
            try{
                $str = "alter table m_parameter add ".$para." ".$type." comment '".$comment."'";
                $res =Db::execute($str);
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
            return show(1,"添加成功");
        }else{
            return $this->fetch('',[

            ]);
        }
    }

    //添加实验组别
    public function addexperiencegroups(){
        if(request()->isPost()){
            $data = input('post.');
            foreach ($data as $key=>$value){
                if(!trim($value)){
                    return show(0,"参数名不能为空");
                }
            }
            try{
                model('Parameter')->save($data);
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
            return show(1,"保存成功");
        }else{
            $tablefields = Db::query("SHOW FULL COLUMNS FROM "."m_parameter");
            return $this->fetch('',[
                'tablefields' => $tablefields
            ]);
        }
    }

    //查看参数表数据
    public function index_info(){
        $data = model('Parameter')->getAllData();
        $count = count($data);
        $tablefields = Db::query("SHOW FULL COLUMNS FROM "."m_parameter");
        return $this->fetch('',[
            'data' => $data,
            'count' => $count,
            'tablefields' => $tablefields,
        ]);
    }
}