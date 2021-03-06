<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>患病记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

</head>
<body>

<form action="addSickRecordHandle" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">发病日期:</td>
            <td><input type="text" name="sickDate" width="20" placeholder="必填项" data-provide="datepicker" class="datepicker"></td>
            <td align="center">发病年龄:</td>
            <td><input type="text" name="sickAge" width="20"></td>
            <td align="center">就诊机构:</td>
            <td><input type="text" name="checkPlace" width="20"></td>
        </tr>

        <tr>
            <td align="center">诊断:</td>
            <td colspan="5"><textarea  name="diagnosis" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center">主要症状:</td>
            <td colspan="5"><textarea  name="mainSymptom" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center">治疗情况:</td>
            <td colspan="5"><textarea  name="treatmentSituation" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center">病情转归:</td>
            <td colspan="5"><textarea  name="diseaseOutcome" rows="5" cols="100"></textarea></td>
        </tr>
        <tr>
            <td align="center" colspan="3">  <input type="submit" value="添加" class="btn btn-info"> </td>
            <td align="center" colspan="3">  <input type="button" value="取消" class="btn btn-info" onclick="cancel()"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
<script src="/thinkphp/Public/thirdPlug/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

</body>
</html>