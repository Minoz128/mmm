<?php
namespace app\index\controller;
use think\Auth;
use think\Controller;
use think\Db;

class Index extends Controller{
    public function index(){
        if(is_array(session("user")) && session("user")[0]['uid']>0){
            $auth = new Auth();
            $groupInfo = $auth->getGroups(session("user")[0]['uid']);
            $rules = $groupInfo[0]['rules'];
            $info = Db::name('auth_rule')->where('id','in',explode(',',$rules))->select();
            $tree = [];
            //筛选父子关系一一对应的节点
            foreach ($info as $key=>$value){
                if($value['nid'] == 0){
                    $tree[] = $value;
                }
            }

            foreach ($tree as $treeKey=>$treeValue){
                foreach ($info as $infoKey=>$infoValue){
                    if($treeValue['id'] == $infoValue['nid']){
                        $tree[$treeKey]['children'][] = $infoValue;
                    }
                }
            }

            //左侧权限栏存储到session中
            session('tree',$tree);
            //赋值给模板
            return $this->fetch('',[
                'tree' => session('tree'),
                'groupInfo' => $groupInfo
            ]);
        }else{
            $this->redirect('index/login/index');
        }

    }

    public function welcome(){
        return '欢迎进入后台';
    }

    public function loginout(){
        session('tree',null);
        session('user',null);
        $this->redirect('login/index');
    }

    /**
     * 登陆日志
     */
    public function loginfo(){
        $data = model("Loginlog")->getAllData();
        return $this->fetch('',[
            'data' => $data,
            'count' => count($data)
        ]);
    }
}
