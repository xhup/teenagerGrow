<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>孕期检查记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">

</head>
<body>

<form id="pregnancyCheckRecordForm" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">检查日期:</td>
            <td><input type="text" name="checkDate" width="20" readonly="readonly" id="showCheckDate" style="background-color: #9d9d9d" ></td>
            <td align="center">血压:</td>
            <td><input type="text" name="bloodPressure" width="20" id="showBloodPressure"></td>
            <td align="center">体重(kg):</td>
            <td><input type="text" name="weight" width="20" id="showWeight" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">腹围(cm):</td>
            <td><input type="text" name="fuwei" width="20" id="showFuwei" placeholder="保留1位小数"></td>
            <td align="center">宫高(cm):</td>
            <td><input type="text" name="gonggao" width="20" id="showGonggao" placeholder="保留1位小数"></td>
            <td align="center">胎心:</td>
            <td><input type="text" name="taixin" width="20" id="showTaixin"></td>
        </tr>

        <tr>
            <td align="center">胎动:</td>
            <td><input type="text" name="taidong" width="20" id="showTaidong"></td>
            <td align="center">B超:</td>
            <td><input type="text" name="Bchao" width="20" id="showBchao"></td>
            <td align="center">子宫形态:</td>
            <td>
                <select size="1" name="uterusForm" width="20" id="showUterusForm">
                    <option></option>
                    <option value="正常">正常</option>
                    <option value="异常">异常</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">ABNORMUTE:</td>
            <td><input type="text" name="ABNORMUTE" width="20" id="showABNORMUTE"></td>
            <td align="center">卵巢情况:</td>
            <td>
                <select size="1" name="ovary" width="20" id="showOvary">
                   <option></option>
                   <option value="正常">正常</option>
                   <option value="异常">异常</option>
                </select>
            </td>
            <td align="center">ABNORMUTE_A:</td>
            <td><input type="text" name="ABNORMUTE_A" width="20" id="showABNORMUTE_A"></td>
        </tr>

        <tr>
            <td align="center">胎盘情况:</td>
            <td>
                <select size="1" name="taipanSitua" width="20" id="showTaipanSitua">
                    <option></option>
                    <option value="正常">正常</option>
                    <option value="异常">异常</option>
                </select>
            </td>
            <td align="center">ABNORMPLAC:</td>
            <td><input type="text" name="ABNORMPLAC" width="20" id="showABNORMPLAC"></td>
            <td align="center">脐动脉S/D:</td>
            <td><input type="text" name="SD" width="20" id="showSD" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">BPD(cm):</td>
            <td><input type="text" name="BPD" width="20" id="showBPD" placeholder="保留1位小数"></td>
            <td align="center">股骨长(cm):</td>
            <td><input type="text" name="femurLength" width="20" id="showFemurLength" placeholder="保留1位小数"></td>
            <td align="center">羊水量:</td>
            <td><input type="text" name="AFV" width="20" id="showAFV" placeholder="保留1位小数"></td>
        </tr>


        <tr>
            <td align="center" colspan="3">  <input type="submit" value="修改" class="btn btn-info" onclick="modifyRecord('pregnancyCheckRecordForm','pregnancyCheckHandle')"> </td>
            <td align="center" colspan="3">  <input type="submit" value="删除" class="btn btn-info" onclick="deleteRecord('pregnancyCheckRecordForm','showCheckDate','tg_pregnancy_check')"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
<script src="/thinkphp/Public/thirdPlug/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
    /*Ajax获取登录用户信息并显示*/
    $(function(){
        var url="showCheckRecord";
        $.post(url,{"dataForm":"PregnancyCheck"},function(data){
            document.getElementById('showCheckDate').value =data.checkdate;
            document.getElementById('showBloodPressure').value =data.bloodpressure;
            document.getElementById('showWeight').value =data.weight;
            document.getElementById('showFuwei').value =data.fuwei;
            document.getElementById('showGonggao').value =data.gonggao;
            document.getElementById('showTaixin').value =data.taixin;
            document.getElementById('showTaidong').value =data.taidong;
            document.getElementById('showBchao').value =data.bchao;
            document.getElementById('showUterusForm').value =data.uterusform;
            document.getElementById('showABNORMUTE').value =data.abnormute;
            document.getElementById('showOvary').value =data.ovarysituation;
            document.getElementById('showABNORMUTE_A').value =data.abnormute_a;
            document.getElementById('showTaipanSitua').value =data.placentasituation;
            document.getElementById('showABNORMPLAC').value =data.abnormplac;
            document.getElementById('showSD').value =data.sd;
            document.getElementById('showBPD').value =data.bpd;
            document.getElementById('showFemurLength').value =data.femurlength;
            document.getElementById('showAFV').value =data.afv;
        })
    })
</script>

</body>
</html>