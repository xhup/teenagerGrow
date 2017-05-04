<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/cement/cement.css">
    <title>登陆页面</title>
</head>
<body style='background-color:skyblue;'>
<div class="topWelcome">
    <span>欢迎登录混泥砂浆后台管理页面</span>
</div>

    <div class="col-md-3" id="loginImage">
        <img src="/thinkphp/Public/others/cement/images/shajiang.jpg" width="100%" height="100%">
    </div>
    <div class="well col-md-4" id="loginBox">
        <h3 align="center">用户登录</h3><br>
        <div class="input-group input-group-md">
            <span class="input-group-addon">用户名</span>
            <input type="text" class="form-control">
        </div><br>&nbsp;
        <div class="input-group input-group-md">
            <span class="input-group-addon">密码</span>
            <input type="password" class="form-control">
        </div><br>
        <button class="btn-info" id="loginBtn">登陆</button>
    </div>

<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script>
$(document).ready(function(){
    $("#loginBtn").on("click",function(){
        alert("aa");
    })
})
</script>
</body>
</html>