<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"C:\xampp\htdocs\mmm\public/../application/index\view\auth\editfatherrule.html";i:1548213631;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\header.html";i:1548205508;s:61:"C:\xampp\htdocs\mmm\application\index\view\public\footer.html";i:1548205508;}*/ ?>
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
<article class="page-container">
    <form class="form form-horizontal" id="form-mmm-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>父栏目名称：</label>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $data['title']; ?>" placeholder="填写父栏目名称" id="title" name="title">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标识：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $data['name']; ?>" placeholder="填写标识" id="name" name="name">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>图标：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $data['icon']; ?>" placeholder="详见 http://www.h-ui.net/Hui-3.7-Hui-iconfont.shtml" id="icon" name="icon">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>状态：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <span class="select-box">
                    <select name="status" class="select">
                        <option value="1" <?php if($data['status'] == 1): ?> selected="selected"<?php endif; ?> >正常开启</option>
                        <option value="0" <?php if($data['status'] == 0): ?> selected="selected"<?php endif; ?> >冻结</option>
                    </select>
				</span>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button class="btn-form-submit btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>
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
    var SCOPE = {
        'form_add_url' : "<?php echo url('auth/editfatherrule'); ?>",
    }
</script>
</html>