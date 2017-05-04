<?php if (!defined('THINK_PATH')) exit();?><!-- * Created by PhpStorm.-->
<!-- * User: XH-->
<!-- * Date: 2016/3/2-->
<!-- * Time: 19:28-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" media="screen" href="/teenagerGrow/Public/css/teenagerGrow/unvStyle.css">
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body style="background-color:lightskyblue;background-repeat:no-repeat; background-position:center top; overflow:hidden;">

<div id="mainBody">
    <div id="cloud1" class="cloud"></div>
    <div id="cloud2" class="cloud"></div>
</div>

<div class="logintop">
    <span>欢迎登录儿童健康管理网络平台</span>
</div>

<div class="loginbody">
    <form id="loginForm" method="post">
    <div class="loginbox" align="center">
        <ul>
            <li><input name="userName" type="text" class="loginuser" placeholder="用户名" required="required" autofocus="autofocus"></li>
            <li><input name="password" type="text" class="loginpwd" placeholder="密码" required="required"></li>
            <li><input name="login" type="submit" id="loginBtn" class="loginbtn" value="登录">&nbsp&nbsp
                <span><input name="register"  type="submit" id="registerBtn" class="loginbtn" value="新用户注册"></span>
            </li>
        </ul>

    </div>
        </form>
</div>

<script src="/teenagerGrow/Public/js/jquery-2.1.1.min.js"></script>
<script>
    $(function(){
        $("#loginBtn").click(
                function() {
                    var form=document.getElementById("loginForm");
                    form.action="<?php echo U('login');?>";


                })
        $("#registerBtn").click(
                function(){
                    window.location.href="registerView.html"
                })
    })
</script>
</body>
</html>