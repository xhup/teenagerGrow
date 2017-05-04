<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试</title>
</head>
<body>
<form action="<?php echo U('mobile/login');?>" method="post">
    <table align="center" border="0" width="400" cellspacing="5" cellpadding="5">
        <tr>
            <td align="right"><b>用户名:</b></td>
            <td><input type="text" name="mobileID" width="20" placeholder="由英文和数字组成"></td>
        </tr>
        <tr>
            <td align="right"><b>密码:</b></td>
            <td><input type="text" name="password" width="20" placeholder="密码必须大于6位"></td>
        </tr>
        <tr>
            <td align="right">  <input type="submit" value="提交"> </td>
            <td align="left">  <a href="loginview.html">返回登录 </a> </td>
        </tr>
    </table>
</form>
</body>
</html>