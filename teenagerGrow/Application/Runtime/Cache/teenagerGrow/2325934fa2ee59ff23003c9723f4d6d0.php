<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学龄前体检记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">

</head>
<body>

<form id="preschoolCheckRecordForm" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">检查日期:</td>
            <td><input type="text" name="checkDate" width="20" id="showPreschoolCheckDate" readonly="readonly" style="background-color: #9d9d9d"></td>
            <td align="center">年龄(月):</td>
            <td><input type="text" name="age" width="20" id="showPreschoolAge"></td>
            <td align="center">体检机构:</td>
            <td><input type="text" name="checkPlace" width="20" id="showPreschoolCheckPlace"></td>
        </tr>

        <tr>
            <td align="center">体检人员:</td>
            <td><input type="text" name="checkPersonName" width="20" id="showPreschoolCheckPersonName"></td>
            <td align="center">职称:</td>
            <td><input type="text" name="checkPersonTitle" width="20" id="showPreschoolCheckPersonTitle"></td>
            <td align="center">身高:</td>
            <td><input type="text" name="height" width="20" id="showPreschoolHeight" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">身高等级:</td>
            <td><input type="text" name="heightRank" width="20" id="showPreschoolHeightRank"></td>
            <td align="center">体重:</td>
            <td><input type="text" name="weight" width="20" id="showPreschoolWeight" placeholder="保留1位小数"></td>
            <td align="center">体重等级:</td>
            <td><input type="text" name="weightRank" width="20" id="showPreschoolWeightRank"></td>
        </tr>

        <tr>
            <td align="center">头围:</td>
            <td><input type="text" name="touwei" width="20" id="showPreschoolTouwei" placeholder="保留1位小数"></td>
            <td align="center">腹围:</td>
            <td><input type="text" name="fuwei" width="20" id="showPreschoolFuwei" placeholder="保留1位小数"></td>
            <td align="center">WHtR:</td>
            <td><input type="text" name="WHtR" width="20" id="showPreschoolWHtR" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">面色:</td>
            <td><input type="text" name="complexion" width="20" id="showPreschoolComplexion"></td>
            <td align="center">上臂围:</td>
            <td><input type="text" name="shangbiwei" width="20" id="showPreschoolShangbiwei" placeholder="保留1位小数"></td>
            <td align="center">腹部皮褶:</td>
            <td><input type="text" name="fubuFold" width="20" id="showPreschoolFubuFold"></td>
        </tr>

        <tr>
            <td align="center">出牙数目:</td>
            <td><input type="text" name="teethNumber" width="20" id="showPreschoolTeethNumber"></td>
            <td align="center">视力:</td>
            <td><input type="text" name="vision" width="20" id="showPreschoolVision"></td>
            <td align="center">佝偻病体征:</td>
            <td><input type="text" name="signOfRickets" width="20" id="showPreschoolSignOfRickets"></td>
        </tr>

        <tr>
            <td align="center">贫血体征:</td>
            <td><input type="text" name="signOfAnemia" width="20" id="showPreschoolSignOfAnemia"></td>
            <td align="center">心肺:</td>
            <td><input type="text" name="heartAndLung" width="20" id="showPreschoolHeartAndLung"></td>
            <td align="center">腹部:</td>
            <td><input type="text" name="abdomen" width="20" id="showPreschoolAbdomen"></td>
        </tr>

        <tr>
            <td align="center">四肢:</td>
            <td><input type="text" name="limb" width="20" id="showPreschoolLimb"></td>
            <td align="center">饮食情况:</td>
            <td><input type="text" name="eatCondition" width="20" id="showPreschoolEatCondition"></td>
            <td align="center">睡眠情况:</td>
            <td><input type="text" name="sleepCondition" width="20" id="showPreschoolSleepCondition"></td>
        </tr>

        <tr>
            <td align="center">心理行为:</td>
            <td><input type="text" name="mentalBehavior" width="20" id="showPreschoolMentalBehavior"></td>
            <td align="center">血常规:</td>
            <td><input type="text" name="bloodRoutine" width="20" id="showPreschoolBloodRoutine"></td>
            <td align="center">肝功能:</td>
            <td><input type="text" name="liverFunction" width="20" id="showPreschoolLiverFunction"></td>
        </tr>

        <tr>
            <td align="center">大便常规:</td>
            <td><input type="text" name="stoolRoutine" width="20" id="showPreschoolStoolRoutine"></td>
            <td align="center">健康教育:</td>
            <td><input type="text" name="healthyEducation" width="20" id="showPreschoolHealthyEducation"></td>
            <td align="center">预防接种:</td>
            <td><input type="text" name="vaccination" width="20" id="showPreschoolVaccination"></td>
        </tr>

        <tr>
            <td align="center" colspan="3">  <input type="submit" value="修改" class="btn btn-info" onclick="modifyRecord('preschoolCheckRecordForm','preSchoolCheckHandle')"> </td>
            <td align="center" colspan="3">  <input type="submit" value="删除" class="btn btn-info" onclick="deleteRecord('preschoolCheckRecordForm','showPreschoolCheckDate','tg_preschool_age')"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>

<!--Ajax获取登录用户信息并显示-->
<script>
$(function(){
var url="showDetailRecord";
$.post(url,{"dataForm":"PreschoolAge"},function(data){
    document.getElementById('showPreschoolCheckDate').value =data.checkdate;
    document.getElementById('showPreschoolAge').value =data.age;
    document.getElementById('showPreschoolCheckPlace').value =data.checkplace;
    document.getElementById('showPreschoolCheckPersonName').value =data.checkpersonname;
    document.getElementById('showPreschoolCheckPersonTitle').value =data.checkpersontitle;
    document.getElementById('showPreschoolWeight').value =data.babyweight;
    document.getElementById('showPreschoolWeightRank').value =data.weightrank;
    document.getElementById('showPreschoolHeight').value =data.babyheight;
    document.getElementById('showPreschoolHeightRank').value =data.heightrank;
    document.getElementById('showPreschoolTouwei').value =data.touwei;
    document.getElementById('showPreschoolWHtR').value =data.whtr;
    document.getElementById('showPreschoolFuwei').value =data.fuwei;
    document.getElementById('showPreschoolComplexion').value =data.complexion;
    document.getElementById('showPreschoolShangbiwei').value =data.shangbiwei;
    document.getElementById('showPreschoolFubuFold').value =data.abdominalfold;
    document.getElementById('showPreschoolTeethNumber').value =data.teethnumber;
    document.getElementById('showPreschoolVision').value =data.vision;
    document.getElementById('showPreschoolSignOfRickets').value =data.signofrickets;
    document.getElementById('showPreschoolSignOfAnemia').value =data.signofanemia;
    document.getElementById('showPreschoolHeartAndLung').value =data.heartandlung;
    document.getElementById('showPreschoolAbdomen').value =data.abdomen;
    document.getElementById('showPreschoolLimb').value =data.limb;
    document.getElementById('showPreschoolEatCondition').value =data.eatcondition;
    document.getElementById('showPreschoolSleepCondition').value =data.sleepcondition;
    document.getElementById('showPreschoolMentalBehavior').value =data.mentalbehavior;
    document.getElementById('showPreschoolBloodRoutine').value =data.bloodroutine;
    document.getElementById('showPreschoolLiverFunction').value =data.liverfunction;
    document.getElementById('showPreschoolStoolRoutine').value =data.stoolroutine;
    document.getElementById('showPreschoolHealthyEducation').value =data.healthyeducation;
    document.getElementById('showPreschoolVaccination').value =data.vaccination;
})
})
</script>


</body>
</html>