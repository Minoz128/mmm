<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"C:\xampp\htdocs\mmm\public/../application/index\view\dataconfiguration\select.html";i:1548205508;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\header.html";i:1548205508;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\footer.html";i:1548205508;}*/ ?>
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
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 数据预处理 <span class="c-gray en">&gt;</span> 数据筛选 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c">
            当前总数据 : <span><strong><a style="color:lightseagreen;text-decoration:underline" href="<?php echo url('Dataconfiguration/select',['status'=>2]); ?>"><?php echo $allCount; ?></a></strong></span> 条
            已审核数据 : <span><strong><a style="color:green;text-decoration:underline" href="<?php echo url('Dataconfiguration/select',['status'=>1]); ?>"><?php echo $status1Data; ?></a></strong></span> 条
            未审核数据 : <span><strong><a style="color:red;text-decoration:underline" href="<?php echo url('Dataconfiguration/select',['status'=>0]); ?>"><?php echo $status0Data; ?></a></strong></span> 条
            判定机器识别正确的数据 : <span><strong><a style="color:#E48139;text-decoration:underline" href="<?php echo url('Dataconfiguration/select',['status'=>3]); ?>"><?php echo $successCount; ?></a></strong></span> 条
            识别正确率 : <span style="color:red;"><strong><?php echo $rate; ?>&nbsp;&nbsp;(<?php echo $successCount; ?>/<?php echo $allCount; ?>)</strong></span>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="<?php echo url('Dataconfiguration/select',['status'=>0]); ?>" class="btn btn-danger radius"> 查看待审核列表</a>
                <a class="btn btn-primary radius" href="<?php echo url('Dataconfiguration/select',['status'=>1]); ?>"> 查看已审核列表</a>
                <a class="btn btn-warning radius" href="<?php echo url('Dataconfiguration/reset0'); ?>"> 重置所有数据</a>
                <a class="btn btn-success radius" onclick="layer_show('上传图片接口','<?php echo url('Dataconfiguration/uploadimg'); ?>','','500')" href='javascript:void(0)'> 上传图片接口</a>
                <a class="btn btn-secondary radius" onclick="layer_show('百度图片爬取','<?php echo url('Dataconfiguration/patch'); ?>','','350')" href='javascript:void(0)'> 爬虫在线爬取图片接口</a>
                <a class="btn btn-warning radius" onclick="DelConfirm()"> 一键清空所有图片信息</a>
                <a class="btn btn-primary-outline radius" href="<?php echo url('Dataconfiguration/rendomSelectByMachine'); ?>"> 生成机器判别标签</a>
            </span>
            <span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span>
        </div>

        <div class="mt-20">
            <table class="my-table table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                    <tr class="text-c">
                        <th width="40"><input name="" type="checkbox" value=""></th>
                        <th width="20">ID</th>
                        <th width="70">分类</th>
                        <th width="100">图像</th>
                        <th width="60">发布状态</th>
                        <th width="100">机器判定</th>
                        <th width="100">人工修正</th>
                        <th width="170">审核(如果机器标注正确,请选对勾)</th>
                        <th width="55">信息来源</th>
                        <th width="40">正确性</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr class="text-c">
                        <td><input name="" type="checkbox" value=""></td>
                        <td><?php echo $vo['id']; ?></td>
                        <td><?php echo type($vo['type']); ?></td>
                        <td><a href="/mmm/public<?php echo $vo['src']; ?>" target="_blank"><img width="100" class="picture-thumb" src="/mmm/public<?php echo $vo['src']; ?>"></a></td>
                        <td class="td-status"><?php echo status($vo['status']); ?></td>
                        <td class="text-c"><?php echo mechinetags($vo['tag']); ?></td>
                        <td class="text-c"><?php echo manmadetags($vo['manmadetags']); ?></td>
                        <td class="td-manage"><a onclick="layer_show('人工修正标注','<?php echo url('dataconfiguration/updatetag',['id'=>$vo['id']]); ?>','','400')" class="ml-5" title="点击进行人工标注">人工标注</a><a <?php if(($vo['resulterr'] == '1') OR ($vo['resulterr'] == '2')): ?> style="text-decoration:none;display: none" <?php endif; ?> style="text-decoration:none" class="ml-5" onClick="postData(<?php echo $vo['id']; ?>,1)" href="javascript:;" title="判定机器识别结果正确"><i class="Hui-iconfont">&#xe6e1;</i></a> <a <?php if(($vo['resulterr'] == '1') OR ($vo['resulterr'] == '2')): ?> style="text-decoration:none;display: none" <?php endif; ?> style="text-decoration:none" class="ml-5" onClick="postData(<?php echo $vo['id']; ?>,2)" href="javascript:;" title="判定机器识别结果错误"><i class="Hui-iconfont">&#xe6e0;</i></a></td>
                        <td><?php echo getuserbyuid($vo['uid']); ?></td>
                        <td><?php echo resulterr($vo['resulterr']); ?></td>
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
<script type="text/javascript">
    var table = $(".my-table").dataTable({

    });

    function postData(id,resulterr) {
        var url = "<?php echo url('dataconfiguration/getchange'); ?>";
        var data = {"id":id,"resulterr":resulterr};

        switch (resulterr) {
            case 1:
                str = "确定要提交此条评审吗？<br>既您认为机器识别的结果是<span style='color:green'>正确的</span>";
                break;
            case 2:
                str = "确定要提交此条评审吗？<br>既您认为机器识别的结果是<span style='color:red'>错误的</span>";
                break;
        }
        layer.confirm(
            str,
            {btn: ['确定','取消']},
            function(index){
                $.post(url,data,function (result) {
                    //console.log(result);
                    if(result.status == 1){
                        window.location.reload();
                    }
                },'JSON');
            },
            function(index){
                layer.close(index);
            }
        );
    }

    $(document).ready(function () {
        $('.uploadifive-button').css({'top':'7px','display':'inline-block'});
    });

    function DelConfirm() {
        var url = "<?php echo url('dataconfiguration/delimages',['status'=>'del']); ?>";
        layer.confirm(
            "此操作会清空数据库和文件系统保留的图片信息，操作不可逆，确定执行吗？",
            {btn: ['确定','取消']},
            function(index){
                $.get(url,function (result) {
                    if(result.status == 1){
                        window.location.reload();
                    }
                },'JSON');
            },
            function(index){
                layer.close(index);
            }
        );
    }
    

</script>

</html>