<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>青春期体检记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">

</head>
<body>
<!--体检表格上方的新增和查看切换导航条-->
<div class="linkTop">
    <ul class="nav nav-pills bg-info">
        <li><a href="#" onclick="redirectTolinkChild('../view/addAdolesCheckRecord.php?medicalID=','linkAdoleslCheck')">新增体检记录</a></li>
        <li  class="active"><a href="#" onclick="showAllCheckDate('adolescency','../view/adolesCheck.php')">查看体检记录</a></li>
    </ul>
</div>

<form id="adolescencyCheckRecordForm" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">年龄:</td>
            <td><input type="text" name="age" width="20" id="showAdolesCheckAge" placeholder="必填项"></td>
            <td align="center">学校:</td>
            <td><input type="text" name="school" width="20" id="showAdolesCheckSchool"></td>
            <td align="center">年级:</td>
            <td><input type="text" name="grade" width="20" id="showAdolesCheckGrade"></td>
        </tr>

        <tr>
            <td align="center">班级:</td>
            <td><input type="text" name="class" width="20" id="showAdolesCheckClass"></td>
            <td align="center">学号:</td>
            <td><input type="text" name="studentID" width="20" id="showAdolesCheckStudentID"></td>
            <td align="center">班主任:</td>
            <td><input type="text" name="classTeacher" width="20" id="showAdolesCheckClassTeacher"></td>
        </tr>
        <tr>
            <td align="center">体检时间:</td>
            <td><input type="text" name="checkDate" width="20" id="showAdolesCheckDate" placeholder="必填项" readonly="readonly" style="background-color: #9d9d9d"></td>
            <td align="center">体检人员:</td>
            <td><input type="text" name="checkPersonName" width="20" id="showAdolesCheckPersonName"></td>
            <td align="center">身高:</td>
            <td><input type="text" name="height" width="20" id="showAdolesHeight" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">身高HDS:</td>
            <td><input type="text" name="heightHDS" width="20" id="showAdolesHeightHDS"></td>
            <td align="center">体重:</td>
            <td><input type="text" name="weight" width="20" id="showAdolesWeight" placeholder="保留1位小数"></td>
            <td align="center">体重HDS:</td>
            <td><input type="text" name="weightHDS" width="20" id="showAdolesWeightHDS"></td>
        </tr>

        <tr>
            <td align="center">BMI:</td>
            <td><input type="text" name="BMI" width="20" id="showAdolesBMI" placeholder="保留1位小数"></td>
            <td align="center">胸围:</td>
            <td><input type="text" name="xiongwei" width="20" id="showAdolesXiongwei" placeholder="保留1位小数"></td>
            <td align="center">腹围:</td>
            <td><input type="text" name="fuwei" width="20" id="showAdolesFuwei" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">WHtR:</td>
            <td><input type="text" name="WHtR" width="20" id="showAdolesWHtR" placeholder="保留1位小数"></td>
            <td align="center">肺活量:</td>
            <td><input type="text" name="vitalCapacity" width="20" id="showAdolesVitalCapacity"></td>
            <td align="center">血压:</td>
            <td><input type="text" name="bloodPressure" width="20" id="showAdolesBloodPressure"></td>
        </tr>

        <tr>
            <td align="center">脉搏:</td>
            <td><input type="text" name="pulse" width="20" id="showAdolesPulse"></td>
            <td align="center">视力左:</td>
            <td><input type="text" name="visionLeft" width="20" id="showAdolesVisionLeft"></td>
            <td align="center">视力右:</td>
            <td><input type="text" name="visionRight" width="20" id="showAdolesVisionRight"></td>
        </tr>

        <tr>
            <td align="center">系统检查:</td>
            <td><input type="text" name="systemCheck" width="20" id="showAdolesSystemCheck"></td>
            <td align="center">心理行为:</td>
            <td><input type="text" name="mentalBehavior" width="20" id="showAdolesMentalBehavior"></td>
            <td align="center">乳房:</td>
            <td><input type="text" name="breast" width="20" id="showAdolesBreast"></td>
        </tr>

        <tr>
            <td align="center">外阴:</td>
            <td><input type="text" name="vulva" width="20" id="showAdolesVulva"></td>
            <td align="center">月经情况:</td>
            <td><input type="text" name="yuejing" width="20" id="showAdolesYuejing"></td>
            <td align="center">遗精情况:</td>
            <td><input type="text" name="yijing" width="20" id="showAdolesYijing"></td>
        </tr>

        <tr>
            <td align="center">骨龄:</td>
            <td><input type="text" name="boneAge" width="20" id="showAdolesBoneAge"></td>
            <td align="center">生长发育评估:</td>
            <td><input type="text" name="growthEvaluation" width="20" id="showAdolesGrowthEvaluation"></td>
        </tr>

        <tr>
            <td align="center">建议:</td>
            <td colspan="5"><textarea  name="advice" id="showAdolesAdvice" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center" colspan="3">  <input type="submit" value="修改" class="btn btn-info" onclick="modifyRecord('adolescencyCheckRecordForm','adolesCheckHandle')"> </td>
            <td align="center" colspan="3">  <input type="submit" value="删除" class="btn btn-info" onclick="deleteRecord('adolescencyCheckRecordForm','showAdolesCheckDate','tg_adolescency')"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
<!--Ajax获取登录用户信息并显示-->
<script>
    $(function(){
        var url="showDetailRecord";
        $.post(url,{"dataForm":"Adolescency"},function(data){
            document.getElementById('showAdolesCheckAge').value =data.age;
            document.getElementById('showAdolesCheckSchool').value =data.school;
            document.getElementById('showAdolesCheckGrade').value =data.grade;
            document.getElementById('showAdolesCheckClass').value =data.class;
            document.getElementById('showAdolesCheckStudentID').value =data.studentid;
            document.getElementById('showAdolesCheckClassTeacher').value =data.classteacher;
            document.getElementById('showAdolesCheckDate').value =data.checkdate;
            document.getElementById('showAdolesCheckPersonName').value =data.checkpersonname;
            document.getElementById('showAdolesWeight').value =data.height;
            document.getElementById('showAdolesWeightHDS').value =data.heighthds;
            document.getElementById('showAdolesHeight').value =data.weight;
            document.getElementById('showAdolesHeightHDS').value =data.weighthds;
            document.getElementById('showAdolesBMI').value =data.bmi;
            document.getElementById('showAdolesXiongwei').value =data.xiongwei;
            document.getElementById('showAdolesWHtR').value =data.whtr;
            document.getElementById('showAdolesFuwei').value =data.fuwei;
            document.getElementById('showAdolesVitalCapacity').value =data.vitalcapacity;
            document.getElementById('showAdolesBloodPressure').value =data.bloodpressure;
            document.getElementById('showAdolesPulse').value =data.pulse;
            document.getElementById('showAdolesVisionLeft').value =data.visionleft;
            document.getElementById('showAdolesVisionRight').value =data.visionright;
            document.getElementById('showAdolesSystemCheck').value =data.systemcheck;
            document.getElementById('showAdolesMentalBehavior').value =data.mentalbehavior;
            document.getElementById('showAdolesBreast').value =data.breast;
            document.getElementById('showAdolesVulva').value =data.vulva;
            document.getElementById('showAdolesYuejing').value =data.mensescondition;
            document.getElementById('showAdolesYijing').value =data.spermatorrheacondition;
            document.getElementById('showAdolesBoneAge').value =data.boneage;
            document.getElementById('showAdolesGrowthEvaluation').value =data.growthevaluation;
            document.getElementById('showAdolesAdvice').value =data.advice;
        })
    })
</script>

</body>
</html>