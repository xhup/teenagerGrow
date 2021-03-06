<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增青春期体检记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

</head>
<body>

<form action="addAdolesCheckRecordHandle" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">年龄:</td>
            <td><input type="text" name="age" width="20" placeholder="必填项"></td>
            <td align="center">学校:</td>
            <td><input type="text" name="school" width="20"></td>
            <td align="center">年级:</td>
            <td><input type="text" name="grade" width="20"></td>
        </tr>

        <tr>
            <td align="center">班级:</td>
            <td><input type="text" name="class" width="20"></td>
            <td align="center">学号:</td>
            <td><input type="text" name="studentID" width="20"></td>
            <td align="center">班主任:</td>
            <td><input type="text" name="classTeacher" width="20"></td>
        </tr>
        <tr>
            <td align="center">体检时间:</td>
            <td><input type="text" name="checkDate" width="20" placeholder="必填项" data-provide="datepicker" class="datepicker"></td>
            <td align="center">体检人员:</td>
            <td><input type="text" name="checkPersonName" width="20"></td>
            <td align="center">身高:</td>
            <td><input type="text" name="height" width="20" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">身高HDS:</td>
            <td><input type="text" name="heightHDS" width="20"></td>
            <td align="center">体重:</td>
            <td><input type="text" name="weight" width="20" placeholder="保留1位小数"></td>
            <td align="center">体重HDS:</td>
            <td><input type="text" name="weightHDS" width="20"></td>
        </tr>

        <tr>
            <td align="center">BMI:</td>
            <td><input type="text" name="BMI" width="20" placeholder="保留1位小数"></td>
            <td align="center">胸围:</td>
            <td><input type="text" name="xiongwei" width="20" placeholder="保留1位小数"></td>
            <td align="center">腹围:</td>
            <td><input type="text" name="fuwei" width="20" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">WHtR:</td>
            <td><input type="text" name="WHtR" width="20" placeholder="保留1位小数"></td>
            <td align="center">肺活量:</td>
            <td><input type="text" name="vitalCapacity" width="20"></td>
            <td align="center">血压:</td>
            <td><input type="text" name="bloodPressure" width="20"></td>
        </tr>

        <tr>
            <td align="center">脉搏:</td>
            <td><input type="text" name="pulse" width="20"></td>
            <td align="center">视力左:</td>
            <td><input type="text" name="visionLeft" width="20"></td>
            <td align="center">视力右:</td>
            <td><input type="text" name="visionRight" width="20"></td>
        </tr>

        <tr>
            <td align="center">系统检查:</td>
            <td><input type="text" name="systemCheck" width="20"></td>
            <td align="center">心理行为:</td>
            <td><input type="text" name="mentalBehavior" width="20"></td>
            <td align="center">乳房:</td>
            <td><input type="text" name="breast" width="20"></td>
        </tr>

        <tr>
            <td align="center">外阴:</td>
            <td><input type="text" name="vulva" width="20"></td>
            <td align="center">月经情况:</td>
            <td><input type="text" name="yuejing" width="20"></td>
            <td align="center">遗精情况:</td>
            <td><input type="text" name="yijing" width="20"></td>
        </tr>

        <tr>
            <td align="center">骨龄:</td>
            <td><input type="text" name="boneAge" width="20"></td>
            <td align="center">生长发育评估:</td>
            <td><input type="text" name="growthEvaluation" width="20"></td>
        </tr>

        <tr>
            <td align="center">建议:</td>
            <td colspan="5"><textarea  name="advice" rows="5" cols="100"></textarea></td>
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