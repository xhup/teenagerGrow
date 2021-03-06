<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增孕期检查记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

</head>
<body>

<form action="addPregnancyRecordHandle" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">检查日期:</td>
            <td><input type="text" name="checkDate" width="20" placeholder="必填项"  data-provide="datepicker" class="datepicker"></td>
            <td align="center">血压:</td>
            <td><input type="text" name="bloodPressure" width="20"></td>
            <td align="center">体重(kg):</td>
            <td><input type="text" name="weight" width="20"  placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">腹围(cm):</td>
            <td><input type="text" name="fuwei" width="20"  placeholder="保留1位小数"></td>
            <td align="center">宫高(cm):</td>
            <td><input type="text" name="gonggao" width="20"  placeholder="保留1位小数"></td>
            <td align="center">胎心:</td>
            <td><input type="text" name="taixin" width="20" ></td>
        </tr>

        <tr>
            <td align="center">胎动:</td>
            <td><input type="text" name="taidong" width="20" ></td>
            <td align="center">B超:</td>
            <td><input type="text" name="Bchao" width="20" ></td>
            <td align="center">子宫形态:</td>
            <td>
                <select size="1" name="uterusForm" width="20">
                    <option></option>
                    <option value="正常">正常</option>
                    <option value="异常">异常</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">ABNORMUTE:</td>
            <td><input type="text" name="ABNORMUTE" width="20"></td>
            <td align="center">卵巢情况:</td>
            <td>
                <select size="1" name="ovary" width="20">
                    <option></option>
                    <option value="正常">正常</option>
                    <option value="异常">异常</option>
                </select>
            </td>
            <td align="center">ABNORMUTE_A:</td>
            <td><input type="text" name="ABNORMUTE_A" width="20"></td>
        </tr>

        <tr>
            <td align="center">胎盘情况:</td>
            <td>
                <select size="1" name="taipanSitua" width="20">
                    <option></option>
                    <option value="正常">正常</option>
                    <option value="异常">异常</option>
                </select>
            </td>
            <td align="center">ABNORMPLAC:</td>
            <td><input type="text" name="ABNORMPLAC" width="20"></td>
            <td align="center">脐动脉S/D:</td>
            <td><input type="text" name="SD" width="20" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">BPD(cm):</td>
            <td><input type="text" name="BPD" width="20" placeholder="保留1位小数"></td>
            <td align="center">股骨长(cm):</td>
            <td><input type="text" name="femurLength" width="20" placeholder="保留1位小数"></td>
            <td align="center">羊水量:</td>
            <td><input type="text" name="AFV" width="20" placeholder="保留1位小数"></td>
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