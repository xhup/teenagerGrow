<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" media="screen" href="/teenagerGrow/Public/css/teenagerGrow/unvStyle.css">
<span class="first"> 青少年健康成长</span>
<span class="rightTag">
    <img src="/teenagerGrow/Public/others/teenagerGrow/images/head_icon.png" width="25">
    <span id="currentUser"></span>
<a href="<?php echo U('Login/changePasswdView');?>" target="_top">更改密码</a>
<a href="<?php echo U('Login/userInformationView');?>" target="_top">用户中心</a>
<a href="javascript:if(confirm('确实要退出?'))location='loginOut'">退出用户</a>
<a href="<?php echo U('Login/mainView');?>" target="_top">返回主页</a>
</span>

<hr>
<!--显示系统时间-->
<div id="clock"></div>
<script>setInterval("clock.innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",10);</script>
<!--<script src="/teenagerGrow/Public/js/jquery-2.1.1.min.js"></script>-->
<script>
    $("#currentUser").load("<?php echo U('sessionCheck');?>");//通过ajax在网页右上角显示当前登录用户名
</script>