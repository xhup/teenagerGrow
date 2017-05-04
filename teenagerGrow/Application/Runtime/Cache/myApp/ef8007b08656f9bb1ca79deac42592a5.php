<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <title>登录界面</title>
</head>
<body>
<form id="loginForm" method="post" action="<?php echo U('login');?>">
    <table>
        <tr>
            <td><input name="userName" type="text"  placeholder="用户名" required="required"></td>
        </tr>
        <tr>
            <td><input name="passWord" type="text" placeholder="密码" required="required"></td>
        </tr>
        <tr>
            <td><input name="login" type="submit" id="loginBtn"  value="登录"></td>
        </tr>
    </table>


</form>

</body>
</html>