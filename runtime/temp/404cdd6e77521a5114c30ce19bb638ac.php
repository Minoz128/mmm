<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"C:\xampp\htdocs\mmm\public/../application/index\view\auth\user.html";i:1548290877;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\header.html";i:1548205508;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\footer.html";i:1548205508;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统设置 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a class="btn btn-primary radius" data-title="添加用户" data-href="" onclick="layer_show('添加信息','<?php echo url('auth/adduser'); ?>','','350')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a> </span> <span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="my-table table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="25">ID</th>
                <th width="80">隶属于用户组</th>
                <th width="100">用户名</th>
                <th width="120">密码</th>
                <th width="100">状态(单击此列修改启用状态)</th>
                <th width="80">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($users) || $users instanceof \think\Collection || $users instanceof \think\Paginator): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="" name=""></td>
                <td><?php echo $vo['uid']; ?></td>
                <td><?php echo group_id($vo['group_id']); ?></td>
                <td><?php echo $vo['username']; ?></td>
                <td><?php echo $vo['password']; ?></td>
                <td><a <?php if($vo['uid'] == 1): ?> style="display: none" <?php endif; ?> href="<?php echo url('auth/updateuserstatus',['uid'=>$vo['uid'],'status'=>$vo['status'] == 1?0:1]); ?>" title="切换状态"><?php echo commonstatus($vo['status']); ?></a> <span <?php if($vo['uid'] == 1 or $vo['status'] != 0): ?> style="display: none" <?php endif; ?>>冻结状态</span></td>
                <td class="f-14 td-manage"> <a <?php if($vo['uid'] == 1): ?> style="display: none" <?php endif; ?> style="text-decoration:none" class="ml-5" onClick="layer_show('编辑用户','<?php echo url('auth/edituser',['uid'=>$vo['uid']]); ?>','','350')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a <?php if($vo['uid'] == 1): ?> style="display: none" <?php endif; ?> style="text-decoration:none" class="ml-5" onClick="del(<?php echo $vo['uid']; ?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a> </td>
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

    function del(uid) {
        if(uid){
            var url = "<?php echo url('auth/deluser'); ?>";
            var data = {'uid':uid};
            layer.open({
                title: '请确认',
                icon: 3,
                content: '确认删除该用户吗？',
                btn: ['确定', '取消'],
                yes: function(index) {
                    $.post(url,data,function (result) {
                        if(result.status == 1){
                            window.location.reload();
                        }
                        else if(result.status == 0){
                            dialog.error(result.message);
                        }
                    },'JSON')
                },
                function(index) {
                    layer.close(index)
                }
            })
        }
    }
</script>