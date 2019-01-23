<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019-01-23
 * Time: 22:34
 */
namespace app\index\validate;
use think\Validate;

class Parameter extends Validate{
    //什么场景
    protected $scene=[
        'edit' => ['id','status','title'],
        'add' => ['type','parameter','comment'],
    ];

    //加载什么数据
    protected $rule=[
        ['type','require','字段类型不能为空'],
        ['parameter','require','字段名不能为空'],
        ['comment','require','为方便实验进行管理,请养成良好的习惯，为字段加上备注']
    ];

}