<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function show($status,$message,$data=[]){
    $result = [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
    exit(json_encode($result));
}

function type($type){
    $condition = [
        'id' => $type
    ];
    $data = \think\Db::name('base')->where($condition)->find();
    return $data['name'];
}

function status($status){
    $str = "";
    switch ($status){
        case '0' :
            $str = "<span class=\"label label-danger radius\">未审核</span>";
            break;
        case '1' :
            $str = "<span class=\"label label-success radius\">已审核</span>";
            break;

    }
    return $str;
}

function resulterr($resulterr){
    $str = "";
    if($resulterr == 1){
        $str = "<span class=\"label label-success radius\">正确</span>";
    }else if($resulterr == 2){
        $str = "<span class=\"label label-danger radius\">错误</span>";
    }
    return $str;
}

function getuserbyuid($uid){
    $res = \think\Db::name('auth_group_access')->field('username')->where('uid','eq',$uid)->find();
    return $res['username'];
}

function commonstatus($status){
    if($status == 0){
        return "<span class=\"label label-danger radius\">冻结</span>";
    }else if($status == 1){
        return "<span class=\"label label-success radius\">启用</span>";
    }
}

function rules($rules){
    $res = \think\Db::name('auth_rule')->where('id','in',explode(",",$rules))->where('nid','neq',0)->select();
    $title = "";
    foreach ($res as $key=>$value){
        $title.= $value['title'].',';
    }
    $title = substr($title,0,-1);
    return $title;
}

function group_id($group_id){
    $res =  \think\Db::name("auth_group")->field('title')->where('id','eq',$group_id)->find();
    return $res['title'];
}

function manmadetags($manmadetags){
    $res = \think\Db::name("tagbase")->field('tagname')->where('id','in',explode(",",$manmadetags))->select();
    $title = "";
    foreach ($res as $key=>$value){
        $title.= '<span class="btn btn-default size-S radius">'.$value['tagname'].'</span> ';
    }
    $title = substr($title,0,-1);
    return $title;
}





