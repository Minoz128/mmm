<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-08
 * Time: 20:30
 */

namespace app\index\controller;
use think\Controller;
use think\Exception;

class Auth extends Controller{
    /**
     * @return mixed显示用户组
     */
    public function authgroup(){
        $allData = model('AuthGroup')->getAllData();
        return $this->fetch('',[
            'allData' => $allData,
            'count' => count($allData)
        ]);
    }

    /**
     * 用户组下修改状态(和单一用户修改状态区别是前者需要先修改用户组，再去修改用户表中所有关联此用户组的信息)
     */
    public function groupstatus(){
        $status = input('get.status');
        $id = input('get.id');
        if(is_numeric($status) && $id>0){
            $res = model('AuthGroup')->save(['status'=>$status],['id'=>$id]);
            if($res){
                $result = model('AuthGroupAccess')->updateData($id,$status);
                if($result){
                    $this->success("状态更新成功");
                }else{
                    $this->error("状态更新失败");
                }
            }else{
                $this->error("未知错误");
            }
        }else{
            $this->error("状态标识不合法");
        }
    }

    /**
     * @param $groupid 用户组id
     * @return mixed
     * 根据用户组id查看改组下所有的成员
     */
    public function searchlistinfo($groupid){
        if(is_numeric($groupid)){
            $data = $result = model('AuthGroupAccess')->getDataByGroupId($groupid);
            return $this->fetch('',[
                'data' => $data
            ]);
        }
    }

    /**
     *
     * @return mixed
     * @throws \think\exception\DbException
     * 加载编辑页面
     */
    public function editgroup(){
        $groupid = input('get.groupid');
        if($groupid){
            //加载编辑页面
            if(is_numeric($groupid)){
                $res = model('AuthGroup')->get($groupid);
                return $this->fetch('',[
                    'data' => $res,
                ]);
            }
        }else{
            //编辑功能实现
            if(input('post.')){
                $postData = input('post.');
                $isRepeat = model('AuthGroup')->checkRepect($postData['id'],$postData['title']);
                //检查重名
                if($isRepeat){
                    return show(0,"当前已存在重名用户组名，请更换");
                }
                //验证数据是否合法
                if(!validate("AuthGroup")->scene("edit")->check($postData)){
                    return show(0,validate("AuthGroup")->getError());
                }
                //数据入库操作
                try{
                    $res = model("AuthGroupAccess")->updateData($postData['id'],$postData['status']);
                    $res1 = model("AuthGroup")->updatePost($postData,$postData['id']);
                    return show(1,"更新成功");
                }catch (Exception $e){
                    return show(1,$e->getMessage());
                }

            }
        }
    }

    //删除操作逻辑
    public function del(){
        $id = input('post.id');
        if($id){
           $res = model("AuthGroupAccess")->del($id);
           $res1 = model("AuthGroup")->del($id);
           if($res1){
               return show(1,"删除成功");
           }else{
               return show(0,"删除失败");
           }
        }
    }

    /**
     * 添加用户组页面
     */
    public function addgroup(){
        //添加操作
        $postData = input('post.');
        if($postData){
            $isRepeat = model('AuthGroup')->checkRepect(0,$postData['title']);
            //检查重名
            if($isRepeat){
                return show(0,"当前已存在重名用户组名，请更换");
            }
            //验证数据是否合法
            if(!validate("AuthGroup")->scene("add")->check($postData)){
                return show(0,validate("AuthGroup")->getError());
            }
            //数据入库操作
            try{
                $res = model("AuthGroup")->save($postData);
                if($res){
                    return show(1,"添加成功");
                }else{
                    return show(0,"添加失败");
                }
            }catch (Exception $e){
                return show(1,$e->getMessage());
            }
        }else{
            //添加页面
            return $this->fetch();
        }

    }

    /**
     * @return mixed|void
     * @throws \think\exception\DbException
     * 获取用户组权限
     */
    public function authrule(){
        if(request()->isPost()){
            $id = input('post.id');
            $tmp = model('AuthGroup')->get($id);
            $returnId = $tmp['rules'];
            if($returnId){
                return show(1,'获取成功',$returnId);
            }else{
                return show(0,'获取失败');
            }
        }else{
            if(session('tree')){
                $groups = model('AuthGroup')->getAllData();
                return $this->fetch('',[
                    'tree' => session('tree'),
                    'groups' => $groups,
                ]);
            }else{
                return $this->redirect('index/login/index');
            }
        }
    }

    public function postrule(){
        $id = input('post.id');
        $rules = input('post.rules');
        $res = model('AuthGroup')->checkHasId($id);
        if($res){
            $result = model('AuthGroup')->save(['rules'=>$rules],['id'=>$id]);
            if($result){
                return show(1,"保存成功");
            }else{
                return show(0,"保存失败");
            }
        }
    }

    /**
     * @return mixed展示用户
     */
    public function user(){
        $users = model("AuthGroupAccess")->getAllData();
        $count = count($users);
        return $this->fetch('',[
            'users' => $users,
            'count' => $count
        ]);
    }

    /**
     * @return mixed|void添加用户及实现
     */
    public function adduser(){
        if(request()->isPost()){
            $data = input("post.");
            if(is_array($data)){
                //查重:用户名
                $res = model('AuthGroupAccess')->checkRepeat(0,$data['username']);
                if($res){
                    return show(0,'该用户名已被注册,请更换');
                }
                //验证字段
                if(!Validate('AuthGroupAccess')->scene('add')->check($data)){
                    return show(0,Validate('AuthGroupAccess')->getError());
                };
                //数据入库操作
                try{
                    $res = model("AuthGroupAccess")->save($data);
                    if($res){
                        return show(1,"添加成功");
                    }else{
                        return show(0,"添加失败");
                    }
                }catch (Exception $e){
                    return show(1,$e->getMessage());
                }
            }

        }else{
            $group = model('AuthGroup')->getAllData();
            return $this->fetch('',[
                'group' => $group
            ]);
        }
    }

    /**
     * 编辑用户及实现
     * @return mixed|void
     * @throws \think\exception\DbException
     */
    public function edituser(){
        if(request()->isGet()){
            $uid = input('get.uid');
            if(is_numeric($uid)){
                $data = model('AuthGroupAccess')->get($uid);
                $group = model('AuthGroup')->getAllData();
                return $this->fetch('',[
                    'data' => $data,
                    'group' => $group
                ]);

            }
        }else if(request()->isPost()){
            $data = input('post.');
            if(is_array($data)){
                //查询用户名(除了自己之外是否重复)
                $res = model('AuthGroupAccess')->checkRepeat($data['uid'],$data['username']);
                if($res){
                    return show(0,"该用户名已被注册,请更换");
                }
                //验证数据格式
                if(!Validate('AuthGroupAccess')->scene('edit')->check($data)){
                    return show(0,Validate('AuthGroupAccess')->getError());
                }
                //数据入库
                try{
                    model('AuthGroupAccess')->save($data,['uid'=>$data['uid']]);
                    return show(1,"更新成功");
                }catch (Exception $e){
                    return show(0,$e->getMessage());
                }
            }else{
                return show(0,"传入数据不合法");
            }
        }
    }

    /**
     * 删除用户
     */
    public function deluser(){
        if(request()->isPost()){
            $uid = input('post.uid');
            if(is_numeric($uid)){
                $res = model('AuthGroupAccess')->delUser($uid);
                if($res){
                    return show(1,"删除成功");
                }else{
                    return show(0,"删除失败");
                }
            }
        }
    }

    /**
     * 更改用户状态
     */
    public function updateuserstatus(){
        $status = input('get.status');
        $uid = input('get.uid');
        if(is_numeric($status) && $uid>0){
            $result = model('AuthGroupAccess')->updateDataByUid($uid,$status);
            if($result){
                $this->success("状态更新成功");
            }else{
                $this->error("状态更新失败");
            }
        }else{
            $this->error("状态标识不合法");
        }
    }


}