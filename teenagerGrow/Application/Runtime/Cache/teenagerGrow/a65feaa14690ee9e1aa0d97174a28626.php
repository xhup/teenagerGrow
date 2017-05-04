<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>身高体重输入</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
</head>
<body>
<div class="linkTop">
    <ul class="nav nav-pills bg-info">
        <li class="active"><a href="#" onclick="redirectTolinkChild('../view/addPregnancyRecord.php?medicalID=','linkPregnancyCheck')">输入数据</a></li>
        <li><a href="#" onclick="showAllCheckDate('pregnancy_check','../view/pregnancyCheck.php')">修改数据</a></li>
    </ul>
</div>
<form action="heightAndWeight" method="post">
    <table align="center" border="1" width="500" cellspacing="5" cellpadding="5" class="messageInput">
        <caption align="center"> 更新儿童身高体重信息</caption>
        <tr>
            <td align="right"><b>儿童就诊号:</td>
            <td><input type="text" name="medicalID" id="getMedicalID" onchange="butAble('#getMedicalID','#getMedicalIDBut')"></td>
            <td><input  disabled type="button" value="核对信息" id="getMedicalIDBut" onclick="checkInfo('#getMedicalID','#getChildName','#getChildSex')"></td>
        </tr>
        <tr>
            <td align="right"><b>儿童姓名:</td>
            <td colspan="2"><input type="text" name="childName" id="getChildName" readonly="readonly" style="background-color: #9d9d9d"></td>
        </tr>
        <tr>
            <td align="right"><b>儿童性别:</td>
            <td colspan="2"><input type="text" name="childSex" id="getChildSex" readonly="readonly" style="background-color: #9d9d9d"></td>
        </tr>
        <tr>
            <td align="right"><b>儿童年龄:</b></td>
            <td colspan="2">
                <select size="1" name="childAge">
                    <option></option>
                    <option value="2">2.00岁</option> <option value="2.25">2.25岁</option> <option value="2.5">2.50岁</option> <option value="2.75">2.75岁</option>
                    <option value="3">3.00岁</option> <option value="3.25">3.25岁</option> <option value="3.5">3.50岁</option> <option value="3.75">3.75岁</option>
                    <option value="4">4.00岁</option> <option value="4.25">4.25岁</option> <option value="4.5">4.50岁</option> <option value="4.75">4.75岁</option>
                    <option value="5">5.00岁</option> <option value="5.25">5.25岁</option> <option value="5.5">5.50岁</option> <option value="5.75">5.75岁</option>
                    <option value="6">6.00岁</option> <option value="6.25">6.25岁</option> <option value="6.5">6.50岁</option> <option value="6.75">6.75岁</option>
                    <option value="7">7.00岁</option> <option value="7.25">7.25岁</option> <option value="7.5">7.50岁</option> <option value="7.75">7.75岁</option>
                    <option value="8">8.00岁</option> <option value="8.25">8.25岁</option> <option value="8.5">8.50岁</option> <option value="8.75">8.75岁</option>
                    <option value="9">9.00岁</option> <option value="9.25">9.25岁</option> <option value="9.5">9.50岁</option> <option value="9.75">9.75岁</option>
                    <option value="10">10.00岁</option> <option value="10.25">10.25岁</option> <option value="10.5">10.50岁</option> <option value="10.75">10.75岁</option>
                    <option value="11">11.00岁</option> <option value="11.25">11.25岁</option> <option value="11.5">11.50岁</option> <option value="11.75">11.75岁</option>
                    <option value="12">12.00岁</option> <option value="12.25">12.25岁</option> <option value="12.5">12.50岁</option> <option value="12.75">12.75岁</option>
                    <option value="13">13.00岁</option> <option value="13.25">13.25岁</option> <option value="13.5">13.50岁</option> <option value="13.75">13.75岁</option>
                    <option value="14">14.00岁</option> <option value="14.25">14.25岁</option> <option value="14.5">14.50岁</option> <option value="14.75">14.75岁</option>
                    <option value="15">15.00岁</option> <option value="15.25">15.25岁</option> <option value="15.5">15.50岁</option> <option value="15.75">15.75岁</option>
                    <option value="16">16.00岁</option> <option value="16.25">16.25岁</option> <option value="16.5">16.50岁</option> <option value="16.75">16.75岁</option>
                    <option value="17">17.00岁</option> <option value="17.25">17.25岁</option> <option value="17.5">17.50岁</option> <option value="17.75">17.75岁</option>
                    <option value="18">18.00岁</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right"><b>儿童身高:</td>
            <td colspan="2"><input type="text" name="childHeight" placeholder=" 保留一位小数">&nbspCM</td>
        </tr>
        <tr>
            <td align="right"><b>儿童体重:</td>
            <td colspan="2"><input type="text" name="childWeight" placeholder=" 保留一位小数">&nbspKG</td>
        </tr>
        <tr>
            <td align="right">  <input type="submit" value="更新" class="btn-info"> </td>
            <td align="center" colspan="2">  <a href="welcome.php" class="">返回主页 </a> </td>
        </tr>
    </table>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
</body>
</html>