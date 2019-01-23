<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"C:\xampp\htdocs\mmm\public/../application/index\view\auth\rule.html";i:1548213860;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\header.html";i:1548205508;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\footer.html";i:1548205508;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/mmm/public/static/hui/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/mmm/public/static/hui/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/mmm/public/static/uploadifive/uploadifive.css" />
    <link rel="stylesheet" type="text/css" href="/mmm/public/static/hui/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/mmm/public/static/hui/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/mmm/public/static/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/mmm/public/static/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/mmm/public/static/hui/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/mmm/public/static/hui/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统设置 <span class="c-gray en">&gt;</span> 栏目设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" data-title="添加父节点" data-href="" onclick="layer_show('添加父节点','<?php echo url('auth/addfatherrule'); ?>','','400')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加父节点</a> <a class="btn btn-primary radius" data-title="添加子节点" data-href="" onclick="layer_show('添加子节点','<?php echo url('auth/addsonrule'); ?>','','450')" href="javascript:;"><i class="Hui-iconfont">&#xe627;</i> 添加子节点</a></span> <span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="my-table table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="25">ID</th>
                <th width="80">名称</th>
                <th width="100">url</th>
                <th width="120">发布状态</th>
                <th width="80">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="" name=""></td>
                <td><?php echo $vo['id']; ?></td>
                <td><?php echo $vo['title']; ?></td>
                <td><?php echo $vo['name']; ?></td>
                <td class="td-status"><a href="<?php echo url('Auth/rulestatus',['id'=>$vo['id'],'status'=>$vo['status']==1?0:1]); ?>"><?php echo commonstatus($vo['status']); ?></a></td>
                <td class="f-14 td-manage"><a <?php if($vo['nid'] != 0): ?> style="display: none" <?php endif; ?>href="<?php echo url('Auth/rule',['id'=>$vo['id']]); ?>">查看对应的子节点</a> <a <?php if($vo['id'] == 3 or $vo['nid'] == 3): ?> style="display: none" <?php endif; ?> style="text-decoration:none" class="ml-5" onClick="layer_show('编辑','<?php echo url('auth/editrule',['id'=>$vo['id']]); ?>','','350')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/mmm/public/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/mmm/public/static/hui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/mmm/public/static/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/mmm/public/static/hui/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript" src="/mmm/public/static/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/mmm/public/static/layer/layer.js"></script>
<script type="text/javascript" src="/mmm/public/static/js/dialog.js"></script>
<script type="text/javascript" src="/mmm/public/static/js/image.js"></script>
<script type="text/javascript" src="/mmm/public/static/js/common.js"></script>
<script type="text/javascript" src="/mmm/public/static/uploadifive/jquery.uploadifive.min.js"></script>

</body>
<script>

</script>