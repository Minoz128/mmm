<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-10
 * Time: 22:15
 */
namespace app\index\validate;
use think\Validate;

class Tagbase extends Validate{
    //什么场景
    protected $scene=[
        'add' => ['connectbaseid','tagname'],
        'addson' => ['status','nid','connectbaseid','tagname'],
    ];

    //加载什么数据
    protected $rule=[
        ['id','require|number','id不能为空|标识不合法'],
        ['nid','require|number','nid不能为空|标识不合法'],
        ['tagname','require|chs','标签名不能为空|设定需要为全中文'],
        ['connectbaseid','require|number','请选择来源实验|标识不合法'],
        ['status','number|in:0,1','状态符需传递|状态符不合法']
    ];
}