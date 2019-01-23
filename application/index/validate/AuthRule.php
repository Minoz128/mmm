<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-22
 * Time: 21:32
 */

namespace app\index\validate;

use think\Validate;

class AuthRule extends Validate{
    protected $scene=[
        'updatestatus' => ['id','status'],
        'addFather' => ['status','title','name'],
        'addSon' => ['nid','status','title','name'],
        'updatefatherrule' => ['id','status','title','name'],
        'updatesonrule' => ['id','nid','status','title','name'],
    ];

    protected $rule = [
        ['id','number|number','id不能为空|id不合法'],
        ['nid','require|number','nid不能为空|nid范围不合法'],
        ['status','require|number','status不能为空|status不合法'],
        ['title','require|chs','权限名称不能为空|权限名必须为中文'],
        ['name','require','URL不能为空'],
        ['icon','require','图标名不能为空'],
    ];
}