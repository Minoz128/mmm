<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019/1/10
 * Time: 9:47
 */
namespace app\index\validate;
use think\Validate;

class AuthGroupAccess extends Validate{
    //什么场景
    protected $scene=[
        'edit' => ['uid','status','username','password','group_id'],
        'add' => ['status','username','password','group_id'],
    ];

    //加载什么数据
    protected $rule=[
        ['uid','require|number','uid不能为空|标识不合法'],
        ['group_id','require|number','请选择该用户隶属的用户组|标识不合法'],
        ['username','require','用户名不能为空'],
        ['password','require','密码不能为空'],
        ['title','require|chs','用户组名不能为空|该字段要求全中文名'],
        ['status','number|in:0,1','状态符需传递|状态符不合法']
    ];

}