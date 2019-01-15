<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-08
 * Time: 23:29
 */
namespace app\index\validate;
use think\Validate;

class AuthGroup extends Validate{
    //什么场景
    protected $scene=[
        'edit' => ['id','status','title'],
        'add' => ['status','title'],
    ];

    //加载什么数据
    protected $rule=[
        ['id','require','id标识需传递'],
        ['title','require|chs','用户组名不能为空|该字段要求全中文名'],
        ['status','number|in:0,1','状态符需传递|状态符不合法']
    ];

}