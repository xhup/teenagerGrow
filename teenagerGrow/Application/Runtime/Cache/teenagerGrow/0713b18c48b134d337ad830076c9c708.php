<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新用户注册</title>
</head>
<body style="background:seagreen">
<link rel="stylesheet" media="screen" href="/teenagerGrow/Public/css/teenagerGrow/unvStyle.css">

<div class="logintop">
    <span>欢迎注册</span>
</div>

<!--显示登录主界面-->
<br> <br> <br>

<div id="registerDiv">
    <div class="registerIcon">
        <img src="/teenagerGrow/Public/others/teenagerGrow/images/timg.jpg" width="100%">
    </div>
    <h2>新用户注册</h2>
<form id="registerForm" method="post">
    <table align="center" cellspacing="5" cellpadding="5">
        <tr>
            <td align="right"><b>用户名:</b></td>
            <td><input type="text" name="user_name" width="20" placeholder="由英文、数字、下划线组成" required="required" autofocus="autofocus"></td>
        </tr>
        <tr>
            <td align="right"><b>密码:</b></td>
            <td><input type="text" name="passwd1" width="20" placeholder="密码必须在6-16位之间" required="required"></td>
        </tr>
        <tr>
            <td align="right"><b>确认密码:</b></td>
            <td><input type="text" name="passwd2" width="20" required="required"></td>
        </tr>
        <tr>
            <td align="right">  <input class="submitBtn" type="submit" value="提交"> </td>
             <td align="left">  <a href="loginview.html">返回登录 </a> </td>
        </tr>
    </table>
</form>
    <script src="/teenagerGrow/Public/js/jquery-2.1.1.min.js"></script>
    <script src="/teenagerGrow/Public/js/publicFunction.js"></script>
    <script>
        $(function(){
            $(".submitBtn").click(function() {
                        var userName=$("#registerForm td input[name='user_name']").val();
                        var password1=$("#registerForm td input[name='passwd1']").val();
                        var password2=$("#registerForm td input[name='passwd2']").val();
                        var form=document.getElementById("registerForm");
                        if(numAndChar(userName)){
                            if(password1.length>5&&password1.length<17){
                                if(password1===password2){
                                    form.action="<?php echo U('register');?>";
                                }else {
                                    alert("两次输入的密码不一致")
                                }
                            }else {
                                alert("密码必须在6-16位之间")
                            }
                        }else {
                            alert("用户名必须只有英文、数字和下划线组成");
                        }


                    })
        })
    </script>
</div>
</body>
</html>