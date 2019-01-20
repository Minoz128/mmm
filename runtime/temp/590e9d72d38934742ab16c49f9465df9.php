<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/Applications/MAMP/htdocs/mmm/public/../application/index/view/login/index.html";i:1547209534;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/mmm/public/static/amazeui/assets/css/amazeui.css" />
    <link rel="stylesheet" href="/mmm/public/static/amazeui/assets/css/other.min.css" />
</head>
<body class="login-container">
<div class="login-box">
    <div class="logo-img">
        <img src="/mmm/public/static/amazeui/assets/images/logo2_03.png" alt="" />
    </div>
    <form class="am-form" method="post">
        <div class="am-form-group">
            <label for="username"><i class="am-icon-user"></i></label>
            <input type="text" id="username" minlength="3" value="" placeholder="输入用户名（至少 3 个字符）"/>
        </div>

        <div class="am-form-group">
            <label for="password"><i class="am-icon-key"></i></label>
            <input type="password" id="password"  value="" placeholder="输入密码"/>
        </div>
        <button class="am-btn am-btn-secondary login-onclick" type="button">登录</button>
    </form>
</div>
</body>
<script type="text/javascript" src="/mmm/public/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/mmm/public/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/mmm/public/static/js/dialog.js"></script>
<script>
    $(document).ready(function () {
        $(".login-onclick").click(function () {
            var username = $("#username").val();
            var password = $("#password").val();
            if(!username){
                layer.open({
                    title: '错误',
                    icon : 0,
                    content: '用户名不能为空'
                });
                return;
            }
            if(!password){
                layer.open({
                    title: '错误',
                    icon : 0,
                    content: '密码不能为空'
                });
                return;
            }
            var url = "<?php echo url('index/login/check'); ?>";
            var data = {'username':username,'password':password};
            $.post(url,data,function(result){
                console.log(result.status);
                if(result.status == 0){
                    layer.open({
                        title: '错误',
                        icon : 0,
                        content: result.message
                    });
                    return;
                }else if(result.status == 1){
                    window.location.href = "<?php echo url('index/index/index'); ?>";
                }
            },"JSON")
        });

    })

</script>
</html>
