<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增学龄前体检记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

</head>
<body>

<form action="addSchoolBeforeCheckRecordHandle" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">检查日期:</td>
            <td><input type="text" name="checkDate" width="20" placeholder="必填项" data-provide="datepicker" class="datepicker"></td>
            <td align="center">年龄:</td>
            <td><input type="text" name="age" width="20" placeholder="必填项"></td>
            <td align="center">体检机构:</td>
            <td><input type="text" name="checkPlace" width="20"></td>
        </tr>

        <tr>
            <td align="center">体检人员:</td>
            <td><input type="text" name="checkPersonName" width="20"></td>
            <td align="center">职称:</td>
            <td><input type="text" name="checkPersonTitle" width="20"></td>
            <td align="center">身高:</td>
            <td><input type="text" name="height" width="20" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">身高等级:</td>
            <td><input type="text" name="heightRank" width="20"></td>
            <td align="center">体重:</td>
            <td><input type="text" name="weight" width="20" placeholder="保留1位小数"></td>
            <td align="center">体重等级:</td>
            <td><input type="text" name="weightRank" width="20" id="showPreschoolWeightRank"></td>
        </tr>

        <tr>
            <td align="center">头围:</td>
            <td><input type="text" name="touwei" width="20" placeholder="保留1位小数"></td>
            <td align="center">腹围:</td>
            <td><input type="text" name="fuwei" width="20" placeholder="保留1位小数"></td>
            <td align="center">WHtR:</td>
            <td><input type="text" name="WHtR" width="20" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">面色:</td>
            <td><input type="text" name="complexion" width="20"></td>
            <td align="center">上臂围:</td>
            <td><input type="text" name="shangbiwei" width="20" placeholder="保留1位小数"></td>
            <td align="center">腹部皮褶:</td>
            <td><input type="text" name="fubuFold" width="20"></td>
        </tr>

        <tr>
            <td align="center">出牙数目:</td>
            <td><input type="text" name="teethNumber" width="20"></td>
            <td align="center">视力:</td>
            <td><input type="text" name="vision" width="20"></td>
            <td align="center">佝偻病体征:</td>
            <td><input type="text" name="signOfRickets" width="20"></td>
        </tr>

        <tr>
            <td align="center">贫血体征:</td>
            <td><input type="text" name="signOfAnemia" width="20"></td>
            <td align="center">心肺:</td>
            <td><input type="text" name="heartAndLung" width="20"></td>
            <td align="center">腹部:</td>
            <td><input type="text" name="abdomen" width="20"></td>
        </tr>

        <tr>
            <td align="center">四肢:</td>
            <td><input type="text" name="limb" width="20"></td>
            <td align="center">饮食情况:</td>
            <td><input type="text" name="eatCondition" width="20"></td>
            <td align="center">睡眠情况:</td>
            <td><input type="text" name="sleepCondition" width="20"></td>
        </tr>

        <tr>
            <td align="center">心理行为:</td>
            <td><input type="text" name="mentalBehavior" width="20"></td>
            <td align="center">血常规:</td>
            <td><input type="text" name="bloodRoutine" width="20"></td>
            <td align="center">肝功能:</td>
            <td><input type="text" name="liverFunction" width="20"></td>
        </tr>

        <tr>
            <td align="center">大便常规:</td>
            <td><input type="text" name="stoolRoutine" width="20"></td>
            <td align="center">健康教育:</td>
            <td><input type="text" name="healthyEducation" width="20"></td>
            <td align="center">预防接种:</td>
            <td><input type="text" name="vaccination" width="20"></td>
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