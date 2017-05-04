<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/cement/cement.css">
    <title>主页</title>
</head>
<body>

<div class="dropdown topOne">
    <span class="rightTag">
    <img src="/thinkphp/Public/others/teenagerGrow/images/head_icon.png" width="25">
    <span class="currentUser"></span>
     </span>
    <button type="button" class="btn-info dropdown-toggle" id="dropdownMenu" data-toggle="dropdown">用户
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation">
            <a role="menuitem" tabindex="-1" href="changePasswdView.html">修改密码</a>
        </li>
        <li role="presentation" class="divider"></li>
        <li role="presentation">
            <a role="menuitem" tabindex="-1"  href="javascript:if(confirm('确实要退出?'))location='loginOut'">注销用户</a>
        </li>
    </ul>
</div>
<!--显示系统时间-->
<div id="clock"></div>



<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".currentUser").load("<?php echo U('login/sessionCheck');?>");//通过ajax在网页右上角显示当前登录用户名
        setInterval("clock.innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",10);
    })
</script>
</body>
</html>