<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <title>新增儿童信息</title>
</head>
<body>
<!--网页头-->
<div id="webHead"></div>
<div class="lefttop"><span></span>新增儿童信息</div>
<div id="addNewChild">
<form method="post" action="<?php echo U('childAddHandle');?>">
    <table align="center" border="0" width="400" cellspacing="5" cellpadding="5" class="messageInput">
        <tr>
            <td align="right"><b>儿童就诊号:</b></td>
            <td><input type="text" name="medicalID"></td>
        </tr>
        <tr>
            <td align="right"><b>儿童姓名:</b></td>
            <td><input type="text" name="childName"></td>
        </tr>
        <tr>
            <td align="right"><b>儿童性别:</b></td>
            <td>
                <select size="1" name="childSex">
                    <option></option>
                    <option value="男">男</option>
                    <option value="女">女</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right"><b>出生日期:</b></td>
            <td><input type="text" name="childBirthday" width="20"  data-provide="datepicker" class="datepicker"></td>
        </tr>
<
      <tr>
          <td align="right"> <input type="submit" value="添加" class="btn-info"> </td>
          <td align="left">  <a href="<?php echo U('Login/mainView');?>">&nbsp;&nbsp;&nbsp;返回主页 </a> </td>
      </tr>
    </table>
</form>
</div>

<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/thirdPlug/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
    $(function(){
        $("#webHead").load("<?php echo U('Login/webHead');?>");
    })
</script>
</body>
</html>