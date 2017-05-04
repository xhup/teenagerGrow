<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>患病记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">

</head>
<body>

<form id="sickRecordForm" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">发病日期:</td>
            <td><input type="text" name="sickDate" width="20" readonly="readonly" id="showSickDate" style="background-color: #9d9d9d"></td>
            <td align="center">发病年龄:</td>
            <td><input type="text" name="sickAge" width="20" id="showSickAge"></td>
            <td align="center">就诊机构:</td>
            <td><input type="text" name="checkPlace" width="20" id="showCheckPlace"></td>
        </tr>

        <tr>
            <td align="center">诊断:</td>
            <td colspan="5"><textarea  name="diagnosis" id="showDiagnosis" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center">主要症状:</td>
            <td colspan="5"><textarea  name="mainSymptom" id="showMainSymptom" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center">治疗情况:</td>
            <td colspan="5"><textarea  name="treatmentSituation" id="showTreatmentSituation" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center">病情转归:</td>
            <td colspan="5"><textarea  name="diseaseOutcome" id="showDiseaseOutcome" rows="5" cols="100"></textarea></td>
        </tr>

        <tr>
            <td align="center" colspan="3">  <input type="submit" value="修改" class="btn btn-info" onclick="modifyRecord('sickRecordForm','sickRecordHandle')"> </td>
            <td align="center" colspan="3">  <input type="submit" value="删除" class="btn btn-info" onclick="deleteRecord('sickRecordForm','showSickDate','sick_record')"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
<script>
    /*Ajax获取登录用户信息并显示*/
    $(function(){
        var url="showCheckRecord";
        $.post(url,{"dataForm":"SickRecord"},function(data){
            document.getElementById('showSickDate').value =data.checkdate;
            document.getElementById('showSickAge').value =data.age;
            document.getElementById('showCheckPlace').value =data.checkplace;
            document.getElementById('showDiagnosis').value =data.diagnosis;
            document.getElementById('showMainSymptom').value =data.mainsymptom;
            document.getElementById('showTreatmentSituation').value =data.treatmentsituation;
            document.getElementById('showDiseaseOutcome').value =data.diseaseoutcome;
        })
    })
</script>
</body>
</html>