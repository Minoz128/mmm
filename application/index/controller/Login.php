<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-07
 * Time: 21:46
 */
namespace app\index\controller;
use think\Controller;

class Login extends Controller{
    public function index(){
        return $this->fetch();
    }

    public function check(){
        $data = input('post.');
        $username = $data['username'];
        $password = $data['password'];
        if(!$username){
            return show(0,"用户名不能为空");
        }
        if(!$password){
            return show(0,"密码不能为空");
        }
        $res = model('auth_group_access')->check($data);

        if($res){
            if(is_array($res) && $res[0]['status'] == 0){
                return show(0,"当前用户已被冻结,请联系管理员开通权限");
            }else{
                session("user",$res);
                $data = [
                    'uid' => $res[0]['uid'],
                    'username' => $res[0]['username'],
                    'group_id' => $res[0]['group_id'],
                    'date' => date('Y-m-d H:i:s'),
                ];
                $logres = model('Loginlog')->save($data);
                if($logres){
                    return show(1,"登录成功");
                }else{
                    return show(0,"登录失败");
                }

            }
        }else{
            return show(0,"用户名或密码错误");
        }
    }
}