<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"C:\xampp\htdocs\mmm\public/../application/index\view\dataset\addmanmadetag.html";i:1548493445;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\header.html";i:1548205508;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\footer.html";i:1548205508;}*/ ?>
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
<div class="container" style="margin-top: 20px;">
    <input type="hidden" name="id" value="<?php echo $id; ?>" id="id">
    <table class="my-table table table-border table-bordered table-bg table-hover table-sort table-responsive">
        <tr>
            <th colspan="2">
                机器识别标注
            </th>
            <th colspan="2">
                手工修正标注
            </th>
        </tr>
        <tr>
            <td colspan="2" class="left" style="text-align: left;text-indent: 100px;">
                <?php if(is_array($tree['childrens']) || $tree['childrens'] instanceof \think\Collection || $tree['childrens'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tree['childrens'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div style="padding: 5px 10px;font-size: 14px"><strong><?php echo $vo['tagname']; ?></strong></div>
                <div style="padding: 5px 10px">
                    <?php if(is_array($vo['sonlists']) || $vo['sonlists'] instanceof \think\Collection || $vo['sonlists'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sonlists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children): $mod = ($i % 2 );++$i;?>
                    <label for="<?php echo $children['id']; ?>"><input type="checkbox" id="<?php echo $children['id']; ?>" name="ids" value="<?php echo $children['id']; ?>">
                        <strong><?php echo $children['tagname']; ?></strong>
                    </label>&nbsp;
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </td>
            <td colspan="2" style="text-align: left;text-indent: 100px;color:#E48139">
                <?php if(is_array($tree['childrens']) || $tree['childrens'] instanceof \think\Collection || $tree['childrens'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tree['childrens'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div style="padding: 5px 10px;font-size: 14px"><strong><?php echo $vo['tagname']; ?></strong></div>
                <div style="padding: 5px 10px">
                    <?php if(is_array($vo['sonlists']) || $vo['sonlists'] instanceof \think\Collection || $vo['sonlists'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['sonlists'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children): $mod = ($i % 2 );++$i;?>
                    <label for="<?php echo $children['id']; ?>"><input type="checkbox" man-id="<?php echo $children['id']; ?>" name="manmade-ids" value="<?php echo $children['id']; ?>">
                        <strong><?php echo $children['tagname']; ?></strong>
                    </label>&nbsp;
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <div class="row cl">
                    <div class="formControls col-xs-offset-1 col-sm-offset-1 col-xs-5 col-sm-5">
                        <input type="hidden" value="<?php echo $tag; ?>" id="tag">
                        <input type="hidden" value="<?php echo $id; ?>" id="id">
                        <button class="btn-form-submit btn btn-secondary radius" onclick="getIds()" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存人工修正的标注</button>
                        <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                    </div>
                    <div class="formControls col-xs-offset-1 col-sm-offset-1 col-xs-2 col-sm-2">
                        <label style="margin-top: 3px">修改人：<?php echo $user; ?></label>
                    </div>
                </div>
            </td>
        </tr>
    </table>
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

    function getIds() {
        var id = $("#id").val();
        var text = "";
        $("[name='manmade-ids']:checked").each(function (index,element) {
            text += $(this).val() + ",";
        });
        text = text.substr(0,text.length-1);
        if(!text){
            dialog.error("请在右侧选择手工标注项");
        }
        var url = "<?php echo url('dataset/updateManMadeTags'); ?>";
        var data = {"id" : id,"manmadetags" : text};
        $.post(url,data,function (result) {
            if(result.status == 1){
                window.parent.location.reload();
            }
            else if(result.status == 0){
                dialog.error(result.message);
            }
        },"JSON");
    }


    var tags = $("#tag").val();
    $(tags.split(",")).each(function (i,dom) {
        $(".left [type='checkbox'][value='"+dom+"']").prop("checked",true);
        $(".left [type='checkbox'][id='"+dom+"']").prop("checked",true);
    });

</script>