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
    public function index(){
        $data = model('Parameter')->getAllData();
        $count = count($data);
        $tablefields = Db::query("SHOW FULL COLUMNS FROM "."m_parameter");
        return $this->fetch('',[
            'data' => $data,
            'count' => $count,
            'tablefields' => $tablefields,
        ]);
    }

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
}