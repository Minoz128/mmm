<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"/Applications/MAMP/htdocs/mmm/public/../application/index/view/dataconfiguration/patch.html";i:1547468073;s:71:"/Applications/MAMP/htdocs/mmm/application/index/view/public/header.html";i:1547209534;s:71:"/Applications/MAMP/htdocs/mmm/application/index/view/public/footer.html";i:1547398902;}*/ ?>
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
<div class="page-container">
    <form class="form form-horizontal" id="form-mmm-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>上传用户：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" attr-uid="<?php echo $user[0]['uid']; ?>" value="<?php echo $user[0]['username']; ?>" placeholder="<?php echo $user[0]['username']; ?>"  name="uid" readonly>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择实验：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="" class="select selectId">
					<option value="">-请选择实验-</option>
                    <?php if(is_array($experience) || $experience instanceof \think\Collection || $experience instanceof \think\Paginator): $i = 0; $__LIST__ = $experience;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['id']; ?>">-<?php echo $vo['name']; ?>-</option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span>
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>爬取数量：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  value="" placeholder="正整数，越多爬取耗时约长，取决于网速，一般推荐不超过60"  name="num" id="num">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>关键字：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text"  value="" placeholder="输入关键字，随后系统提交百度图片检索并下载"  name="patchKeywords" id="patchKeywords">
            </div>
        </div>



        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button onClick="SubmitPatch()" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
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


    function SubmitPatch() {
        var patchKeywords = $("#patchKeywords").val();
        var num = $("#num").val();

        if(!patchKeywords){
            dialog.error("请输入检索关键字！");return;
        }
        if(!num){
            dialog.error("请填写预期爬取数量！");return;
        }
        if (!(/(^[1-9]\d*$)/.test(num))) {
            dialog.error("预期爬取数量不合法，请填写正整数");return;
        }
        var index = layer.load(1, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
        });

        var url = "<?php echo url('dataconfiguration/searchKeywordsAndDownload'); ?>";
        var type = $(".selectId").val();
        var data = {"num":num,"keywords":patchKeywords,"type":type};
        console.log(data);
        $.post(url,data,function (result) {
            if(result.status == 1){
                var data = result.data;
                var str = "从百度图片(https://image.baidu.com/)库中爬取<span style='color:green'> " + data.num + "</span> 张图片" + ", 耗时<span style='color: green'> "+ data.time + " </span>秒" + ", 消耗内存 <span style='color: green'>" + data.memory_use +"Mb </span>";
                dialog.success(str);
            }
        },"JSON");
    }
</script>
</html>