<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"C:\xampp\htdocs\mmm\public/../application/index\view\parameter\index_info.html";i:1548465767;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\header.html";i:1548205508;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\footer.html";i:1548205508;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 数据集管理 <span class="c-gray en">&gt;</span> 参数表数据 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a class="btn btn-success radius" data-title="查看参数表结构" data-href="" href="<?php echo url('parameter/index'); ?>">
                查看记录参数表结构
            </a>
             <a class="btn btn-warning radius" data-title="查看参数表结构" data-href="" href="<?php echo url('parameter/index_info'); ?>">
                查看记录参数表数据(目前table内容等待二次开发)
            </a>


            <a class="btn btn-primary radius" data-title="添加参数" data-href="" onclick="layer_show('添加参数','<?php echo url('parameter/add'); ?>','','350')" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 添加参数(列)
            </a>
            <a class="btn btn-primary radius" data-title="记录实验参数组" data-href="" onclick="layer_show('记录实验参数组','<?php echo url('parameter/addexperiencegroups'); ?>','','350')" href="javascript:;">
                <i class="Hui-iconfont">&#xe600;</i> 记录实验参数组(行)
            </a>
        </span>
        <span class="r">
            共有数据：<strong><?php echo $count; ?></strong> 条
        </span>
    </div>
    <div class="mt-20">
        <table class="my-table table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <?php if(is_array($tablefields) || $tablefields instanceof \think\Collection || $tablefields instanceof \think\Paginator): $i = 0; $__LIST__ = $tablefields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <th width="25"><?php echo $vo['Comment']; ?></th>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c">
                    <td><input type="checkbox" value="" name=""></td>
                    <?php if(is_array($tablefields) || $tablefields instanceof \think\Collection || $tablefields instanceof \think\Paginator): $i = 0; $__LIST__ = $tablefields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                        <td><?php echo $vo1['Field']; ?></td>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
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
    var table = $(".my-table").dataTable({

    });
</script>