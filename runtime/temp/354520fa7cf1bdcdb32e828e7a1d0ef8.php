<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"C:\xampp\htdocs\mmm\public/../application/index\view\datainput\imageupload.html";i:1548290877;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\header.html";i:1548205508;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\footer.html";i:1548205508;}*/ ?>
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
        当前总数据 : <span><strong><a style="color:lightseagreen;text-decoration:underline" href="<?php echo url('Datainput/imageupload',['status'=>2]); ?>"><?php echo $allCount; ?></a></strong></span> 条
        已审核数据 : <span><strong><a style="color:green;text-decoration:underline" href="<?php echo url('Datainput/imageupload',['status'=>1]); ?>"><?php echo $status1Count; ?></a></strong></span> 条
        未审核数据 : <span><strong><a style="color:red;text-decoration:underline" href="<?php echo url('Datainput/imageupload',['status'=>0]); ?>"><?php echo $status0Count; ?></a></strong></span> 条
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a class="btn btn-success radius" onclick="layer_show('批量导入图片接口','<?php echo url('Dataconfiguration/uploadimg'); ?>','','500')" href='javascript:void(0)'> 批量导入图片接口</a>
                <a class="btn btn-warning radius" onclick="DelConfirm()"> 一键删除所有图片信息</a>
            </span>
    </div>
    <div class="mt-20">
        <table class="my-table table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="10"><input name="" type="checkbox" value=""></th>
                <th width="20">ID</th>
                <th width="70">分类</th>
                <th width="100">图像</th>
                <th width="60">发布状态</th>
                <th width="55">信息上传人</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($allData) || $allData instanceof \think\Collection || $allData instanceof \think\Paginator): $i = 0; $__LIST__ = $allData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input name="" type="checkbox" value=""></td>
                <td><?php echo $vo['id']; ?></td>
                <td><?php echo type($vo['type']); ?></td>
                <td><a href="/mmm/public<?php echo $vo['src']; ?>" target="_blank"><img width="100" class="picture-thumb" src="/mmm/public<?php echo $vo['src']; ?>"></a></td>
                <td class="td-status"><?php echo tagstatus($vo['status']); ?></td>
                <td><?php echo getuserbyuid($vo['uid']); ?></td>
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