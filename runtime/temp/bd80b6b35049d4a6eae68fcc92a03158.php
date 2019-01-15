<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:95:"/Applications/MAMP/htdocs/mmm/public/../application/index/view/dataconfiguration/uploadimg.html";i:1547225738;s:71:"/Applications/MAMP/htdocs/mmm/application/index/view/public/header.html";i:1547209534;s:71:"/Applications/MAMP/htdocs/mmm/application/index/view/public/footer.html";i:1547398902;}*/ ?>
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

        <div class="row cl" id="waitarea" style="display: none">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择标签：</label>
            <div class="formControls col-xs-8 col-sm-9" id="nodetext" style="left: 150px;">

            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">图片摘要：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="brief" id="brief" cols="" rows="" class="textarea"  placeholder="备注信息"></textarea>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">上传图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input class="uploadifive" type="file">
                <div id="appendImgList" style="margin-top: 20px;"></div>
            </div>
        </div>


        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button onClick="SubmitForm()" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
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
    var SCOPE = {
        'image_upload' : "<?php echo url('dataconfiguration/upload'); ?>",
        'get_infomation' : "<?php echo url('tagbase/getinfo'); ?>"
    }

    $(".selectId").change(function () {
        var id = $(this).val();
        var url = SCOPE.get_infomation;
        var data = {"id":id};
        $.post(url,data,function (result) {
            //console.log(result);
            var html = "";
            $(result).each(function (i) {
                html += "<div style=\"padding: 5px 10px;font-size: 14px\"><input type=\"checkbox\" onclick=\"return false;\" id=\""+this.tagname+"\" name=\"ids\" value=\""+this.id+"\"><strong>"+this.tagname+"</strong></div>";
                html += "<div style=\"padding: 5px 10px\">";
                    $(this.children).each(function (i) {
                        html += "<label for=\""+this.id+"\"><input type=\"checkbox\" id=\""+this.id+"\" name=\"ids\" value=\""+this.id+"\">"+this.tagname+"</label>&nbsp;";
                    })
                html += "</div>";
            });
            //console.log(html);
            $("#nodetext").html(html);
            $("#waitarea").slideDown();
        },"JSON");
    });
    
    function SubmitForm() {
        var text = "";
        $("[name='ids']:checked").each(function (index,element) {
            text += $(this).val() + ",";
        });
        text = text.substr(0,text.length-1);

        var jsondata = {};
        $("#appendImgList img").each(function (i) {
            var img_url = $(this).attr("relative-src");
            jsondata[i] = img_url
        });

        var uid = $("input[name='uid']").attr("attr-uid");
        var status = 0;
        var type = $(".selectId").val();
        var brief = $("#brief").val();
        //var src = $("#upload_img").attr("relative-src");

        if(!text){
            dialog.error("请选择标签"); return;
        }
        var imgcount = $("#appendImgList img").size();
        if(imgcount == 0){
            dialog.error("请上传图片"); return;
        }

        if(!type){
            dialog.error("请选择实验"); return;
        }
        if(!uid){
            dialog.error("用户名不能为空"); return;
        }

        var url = "<?php echo url('dataconfiguration/adddata'); ?>";
        var data = {"uid":uid,"status":status,"imglist":jsondata,"type":type,"brief":brief,"manmadetags":text};

        $.post(url,data,function(result){
            if(result.status == 0){
                dialog.error(result.message)
            }else if(result.status == 1){
                window.parent.location.reload();
            }
        },'JSON');
    }
</script>
</html>