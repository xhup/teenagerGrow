<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>家族病史</title>
</head>
<body>

<form action="childFamilySickHandle" method="post">
    <table align="center" border="1" width="100%" cellspacing="5" cellpadding="5">
        <tr>
            <td>成员姓名：<input name="memberName"></td>
            <td>性别：<select size="1" name="memberSex"><option></option><option value="男">男</option><option value="女">女</option></select></td>
            <td>与儿童关系：<input name="memberLink"></td>
        </tr>
        <tr>
            <td>病例名称：<input name="sickName"></td>
            <td>发病年龄：<input name="sickAge" placeholder="填入整数">岁</td>
            <td>是否治愈：<select size="1" name="isCure"><option></option><option value="是">是</option><option value="否">否</option></select>
        </tr>
        <tr>
            <td align="center">其他情况:</td>
            <td colspan="2"><textarea  name="others"  rows="5" cols="100"></textarea></td>
        </tr>
        <tr>
            <td align="center" colspan="2">  <input type="submit" value="增加" class="btn btn-info"> </td>
            <td align="center" colspan="1">   <input type="button" value="删除" class="btn btn-info"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script>



</script>
</body>
</html>