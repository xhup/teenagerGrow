<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <title>用户中心</title>
</head>
<body>

<!--网页头-->

<div id="webHead"></div>
<div class="lefttop"><span></span>医生个人信息</div>
<form action="<?php echo U('userInfoHandle');?>" method="post">
    <table align="center" id="doctorInfoForm">
        <tr>
            <td align="right"><b>姓名:</b></td>
            <td><input type="text" name="realName" width="20" id="showDoctorName" required="required" placeholder="必填项"></td>
        </tr>
        <tr>
            <td align="right"><b>性别:</b></td>
            <td>
               <select size="1" name="sex" id="showDoctorSex">
               <option></option>
               <option value="男">男</option>
               <option value="女">女</option>
               </select>
            </td>
        </tr>
        <tr>
            <td align="right"><b>出生日期:</b></td>
            <td><input type="text" name="birthday" id="showDoctorBirthday" width="20"  data-provide="datepicker" class="datepicker"></td>
        </tr>
        <tr>
            <td align="right"><b>联系电话:</b></td>
            <td><input type="text" name="phone" width="20" id="showDoctorPhone"></td>
        </tr>
        <tr>
            <td align="right"><b>邮箱:</b></td>
            <td><input type="email" name="email" width="20" id="showDoctorEmail" required="required" placeholder="必填项"></td>
        </tr>
        <tr>
            <td align="right"><b>地址:</b></td>
            <td><input type="text" name="address" width="20" placeholder="***省***市***区/县" id="showDoctorAddress"></td>
        </tr>
        <tr>
            <td align="right">  <input type="submit" value="确认" class="btn-info"> </td>
            <td align="left">  <a href="mainView.html">&nbsp;&nbsp;&nbsp;返回主页 </a> </td>
        </tr>
    </table>
</form>

<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/thirdPlug/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
    /*Ajax获取登录用户信息并显示*/
    //加载页头
    $(function(){
        $("#webHead").load("webHead.html",function(){
            $url="getUserInfo";
            $.post($url,'',function(data){
                $("#showDoctorName").attr("value",data.name);
                $("#showDoctorSex").attr("value",data.sex);
                document.getElementById('showDoctorSex').value =data.sex;//如果用下面的jquery，不能显示，因为attr要求的value是要select本身的，不能是option的
//            $("#showDoctorSex").attr("value",data.sex);
                $("#showDoctorBirthday").attr("value",data.birthday);
                $("#showDoctorPhone").attr("value",data.phone);
                $("#showDoctorEmail").attr("value",data.email);
                $("#showDoctorAddress").attr("value",data.address);
            })
        });
    })
</script>

</body>
</html>