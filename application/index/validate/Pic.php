<?php
/**
 * Created by PhpStorm.
 * User: yang
 * Date: 2019/1/11
 * Time: 10:51
 */

namespace app\index\validate;
use think\Validate;

class Pic extends Validate{
    //什么场景
    protected $scene=[

        'add' => ['uid','type'],
    ];

    //加载什么数据
    protected $rule=[
        ['uid','require|number','uid不能为空|标识不合法'],
        ['type','require|number','请选择实验|标识不合法'],
        ['manmadetags','require','请选择标签'],
        ['num','number','请输入正整数'],
    ];
}