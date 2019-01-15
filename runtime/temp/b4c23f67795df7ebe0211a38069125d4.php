<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"C:\xampp\htdocs\mmm\public/../application/index\view\tagbase\index.html";i:1547209534;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\header.html";i:1547209534;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\footer.html";i:1547398902;}*/ ?>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统设置 <span class="c-gray en">&gt;</span> 用户组设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <input type="hidden" id="selfroot" value="/mmm/public">
        <button onclick="removeIframe()" class="btn btn-primary radius" style="margin-right: 50px;">关闭选项卡</button>
        <span class="select-box inline">
		<select name="" class="select" id="searchType" style="width:150px">
			<?php if(is_array($tagType) || $tagType instanceof \think\Collection || $tagType instanceof \think\Paginator): $i = 0; $__LIST__ = $tagType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $vo['id']; ?>" <?php if($connectbaseid == $vo['id']): ?> selected="selected"<?php endif; ?>><?php echo $vo['name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
        <button name="" id="" class="btn btn-success" type="button" onclick="searchList()"><i class="Hui-iconfont">&#xe665;</i> 搜索标签组下信息</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <span class="l">
            <a class="btn btn-primary radius" data-title="添加标签组" data-href="" onclick="layer_show('添加信息','<?php echo url('tagbase/addparenttag'); ?>','','300')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加标签组</a>
            <div <?php if($tag == 1): ?> style="display: none" <?php endif; ?> style="display:inline-block">
                <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <a class="btn btn-warning radius" data-title="添加子标签" data-href="" onclick="layer_show('<?php echo $vo['tagname']; ?>','<?php echo url('tagbase/addsontag',['id'=>$vo['id']]); ?>','','350')" href="javascript:;"><i class="Hui-iconfont">&#xe627;</i> <?php echo $vo['tagname']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </span>
        <span class="r">共有数据：<strong><?php echo $count; ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="my-table table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="25">ID</th>
                <th width="80">标签组</th>
                <th width="100">查阅</th>
                <th width="80">状态(单击此列修改启用状态)</th>
                <th width="80">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="text-c">
                    <td><input type="checkbox" value="" name=""></td>
                    <td><?php echo $vo['id']; ?></td>
                    <td><?php echo $vo['tagname']; ?></td>
                    <td><a <?php if($tag == 1): ?> style="display: none" <?php endif; ?> href="<?php echo url('tagbase/index',['nid'=>$vo['id'],'connectbaseid'=>$connectbaseid]); ?>">点击查看组下标签</a></td>
                    <td><a href="<?php echo url('tagbase/tagstatus',['id'=>$vo['id'],'status'=>$vo['status'] == 1?0:1]); ?>" title="切换状态"><?php echo commonstatus($vo['status']); ?></a> <span <?php if($vo['status'] != 0): ?> style="display: none" <?php endif; ?>>停用</span></td>
                    <td class="f-14 td-manage"><a title="查看组下用户" onclick="layer_show('下用户统计','<?php echo url('auth/searchlistinfo',['groupid'=>$vo['id']]); ?>','','300')"><i class="Hui-iconfont">&#xe709;</i></a> <a <?php if($vo['id'] == 1): ?> style="display: none" <?php endif; ?> style="text-decoration:none" class="ml-5" onClick="layer_show('编辑用户组','<?php echo url('auth/editgroup',['groupid'=>$vo['id']]); ?>','','300')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a <?php if($vo['id'] == 1): ?> style="display: none" <?php endif; ?> style="text-decoration:none" class="ml-5" onClick="del(<?php echo $vo['id']; ?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a> </td>
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
    $("#searchType").change(function () {
        var connectbaseid = $(this).val();
        var url =  $("#selfroot").val()+"/index/tagbase/index?connectbaseid="+connectbaseid;
        window.location.href = url;
    });
    
    function searchList() {
        var searchType = $("#searchType").val();
        if(searchType){
            var url = "<?php echo url('tagbase/index'); ?>";
        }

    }

    var table = $(".my-table").dataTable({

    });


</script>