<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学龄期体检记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

</head>
<body>

<form id="schoolCheckRecordForm" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">年龄:</td>
            <td><input type="text" name="age" width="20" id="showSchoolCheckAge"></td>
            <td align="center">学校:</td>
            <td><input type="text" name="school" width="20" id="showSchoolCheckSchool"></td>
            <td align="center">年级:</td>
            <td><input type="text" name="grade" width="20" id="showSchoolCheckGrade"></td>
        </tr>

        <tr>
            <td align="center">班级:</td>
            <td><input type="text" name="class" width="20" id="showSchoolCheckClass"></td>
            <td align="center">学号:</td>
            <td><input type="text" name="studentID" width="20" id="showSchoolCheckStudentID"></td>
            <td align="center">班主任:</td>
            <td><input type="text" name="classTeacher" width="20" id="showSchoolCheckClassTeacher"></td>
        </tr>
        <tr>
            <td align="center">体检时间:</td>
            <td><input type="text" name="checkDate" width="20" id="showSchoolCheckDate" readonly="readonly" style="background-color: #9d9d9d"></td>
            <td align="center">体检人员:</td>
            <td><input type="text" name="checkPersonName" width="20" id="showSchoolCheckPersonName"></td>
            <td align="center">身高:</td>
            <td><input type="text" name="height" width="20" id="showSchoolHeight" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">身高HDS:</td>
            <td><input type="text" name="heightHDS" width="20" id="showSchoolHeightHDS"></td>
            <td align="center">体重:</td>
            <td><input type="text" name="weight" width="20" id="showSchoolWeight" placeholder="保留1位小数"></td>
            <td align="center">体重HDS:</td>
            <td><input type="text" name="weightHDS" width="20" id="showSchoolWeightHDS"></td>
        </tr>

        <tr>
            <td align="center">BMI:</td>
            <td><input type="text" name="BMI" width="20" id="showSchoolBMI" placeholder="保留1位小数"></td>
            <td align="center">胸围:</td>
            <td><input type="text" name="xiongwei" width="20" id="showSchoolXiongwei" placeholder="保留1位小数"></td>
            <td align="center">腹围:</td>
            <td><input type="text" name="fuwei" width="20" id="showSchoolFuwei" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">WHtR:</td>
            <td><input type="text" name="WHtR" width="20" id="showSchoolWHtR" placeholder="保留1位小数"></td>
            <td align="center">肺活量:</td>
            <td><input type="text" name="vitalCapacity" width="20" id="showSchoolVitalCapacity"></td>
            <td align="center">血压:</td>
            <td><input type="text" name="bloodPressure" width="20" id="showSchoolBloodPressure"></td>
        </tr>

        <tr>
            <td align="center">脉搏:</td>
            <td><input type="text" name="pulse" width="20" id="showSchoolPulse"></td>
            <td align="center">视力左:</td>
            <td><input type="text" name="visionLeft" width="20" id="showSchoolVisionLeft"></td>
            <td align="center">视力右:</td>
            <td><input type="text" name="visionRight" width="20" id="showSchoolVisionRight"></td>
        </tr>

        <tr>
            <td align="center">系统检查:</td>
            <td><input type="text" name="systemCheck" width="20" id="showSchoolSystemCheck"></td>
            <td align="center">心理行为:</td>
            <td><input type="text" name="mentalBehavior" width="20" id="showSchoolMentalBehavior"></td>
            <td align="center">乳房:</td>
            <td><input type="text" name="breast" width="20" id="showSchoolBreast"></td>
        </tr>

        <tr>
            <td align="center">外阴:</td>
            <td><input type="text" name="vulva" width="20" id="showSchoolVulva"></td>
            <td align="center">骨龄:</td>
            <td><input type="text" name="boneAge" width="20" id="showSchoolBoneAge"></td>
            <td align="center">生长发育评估:</td>
            <td><input type="text" name="growthEvaluation" width="20" id="showSchoolGrowthEvaluation"></td>
        </tr>

        <tr>
            <td align="center">建议:</td>
            <td colspan="5"><textarea  name="advice" id="showSchoolAdvice" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center" colspan="3">  <input type="submit" value="修改" class="btn btn-info" onclick="modifyRecord('schoolCheckRecordForm','schoolCheckHandle')"> </td>
            <td align="center" colspan="3">  <input type="submit" value="删除" class="btn btn-info" onclick="deleteRecord('schoolCheckRecordForm','showSchoolCheckDate','tg_school_age')"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
<script src="/thinkphp/Public/thirdPlug/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!--Ajax获取登录用户信息并显示-->
<script>
    $(function(){
        var url="showDetailRecord";
        $.post(url,{"dataForm":"SchoolAge"},function(data){
            document.getElementById('showSchoolCheckAge').value =data.age;
            document.getElementById('showSchoolCheckSchool').value =data.school;
            document.getElementById('showSchoolCheckGrade').value =data.grade;
            document.getElementById('showSchoolCheckClass').value =data.class;
            document.getElementById('showSchoolCheckStudentID').value =data.studentid;
            document.getElementById('showSchoolCheckClassTeacher').value =data.classteacher;
            document.getElementById('showSchoolCheckDate').value =data.checkdate;
            document.getElementById('showSchoolCheckPersonName').value =data.checkpersonname;
            document.getElementById('showSchoolWeight').value =data.weight;
            document.getElementById('showSchoolWeightHDS').value =data.weighthds;
            document.getElementById('showSchoolHeight').value =data.height;
            document.getElementById('showSchoolHeightHDS').value =data.heighthds;
            document.getElementById('showSchoolBMI').value =data.bmi;
            document.getElementById('showSchoolXiongwei').value =data.xiongwei;
            document.getElementById('showSchoolWHtR').value =data.whtr;
            document.getElementById('showSchoolFuwei').value =data.fuwei;
            document.getElementById('showSchoolVitalCapacity').value =data.vitalcapacity;
            document.getElementById('showSchoolBloodPressure').value =data.bloodpressure;
            document.getElementById('showSchoolPulse').value =data.pulse;
            document.getElementById('showSchoolVisionLeft').value =data.visionleft;
            document.getElementById('showSchoolVisionRight').value =data.visionright;
            document.getElementById('showSchoolSystemCheck').value =data.systemcheck;
            document.getElementById('showSchoolMentalBehavior').value =data.mentalbehavior;
            document.getElementById('showSchoolBreast').value =data.breast;
            document.getElementById('showSchoolVulva').value =data.vulva;
            document.getElementById('showSchoolBoneAge').value =data.boneage;
            document.getElementById('showSchoolGrowthEvaluation').value =data.growthevaluation;
            document.getElementById('showSchoolAdvice').value =data.advice;
        })
    })
</script>

</body>
</html>