<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>母亲基本信息</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

</head>
<body>

<form action="motherInfoHandle" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">母亲姓名:</td>
            <td><input type="text" name="motherName" width="20" id="showMotherName"></td>
            <td align="center">出生日期:</td>
            <td><input type="text" name="motherBirthday" id="showMotherBirthday" width="20" data-provide="datepicker" class="datepicker"></td>
        </tr>

        <tr>
            <td align="center">母亲身高:</td>
            <td><input type="text" name="motherHeight" width="20" id="showMotherHeight" placeholder="保留一位小数"> CM</td>
            <td align="center">母亲体重:</td>
            <td><input type="text" name="motherWeight" width="20" id="showMotherWeight" placeholder="保留一位小数"> KG</td>
        </tr>

        <tr>
            <td align="center">联系电话:</td>
            <td><input type="text" name="motherPhone" width="20" id="showMotherPhone"></td>
            <td align="center">邮箱:</td>
            <td><input type="text" name="motherEmail" width="20" id="showMotherEmail"></td>
        </tr>

        <tr>
            <td align="center">文化程度:</td>
            <td>
                <select size="1" name="motherEducation" id="showMotherEducation">
                    <option></option>
                    <option value="小学或以下">小学或以下</option>
                    <option value="初中">初中</option>
                    <option value="高中或技校">高中或技校</option>
                    <option value="中专">中专</option>
                    <option value="大专">大专</option>
                    <option value="本科或以上">本科或以上</option>
                </select>
            </td>
            <td align="center">职业:</td>
            <td>
                <select size="1" name="motherJob" id="showMotherJob">
                    <option></option>
                    <option value="干部或管理人员">干部或管理人员</option>
                    <option value="医疗卫生人员">医疗卫生人员</option>
                    <option value="教师">教师</option>
                    <option value="专业科技人员">专业科技人员</option>
                    <option value="办事人员或文员">办事人员或文员</option>
                    <option value="商业或服务业人员">商业或服务业人员</option>
                    <option value="工人">工人</option>
                    <option value="个体经营者">个体经营者</option>
                    <option value="农民或渔民">农民或渔民</option>
                    <option value="无固定职业或下岗">无固定职业或下岗</option>
                    <option value="离退休">离退休</option>
                    <option value="其它职业">其它职业(请注明)</option>
                </select>
            </td>

        </tr>

        <tr>
            <td align="center">吸烟情况:</td>
            <td>
                <select size="1" name="motherSmoke" id="showMotherSmoke">
                    <option></option>
                    <option value="吸烟者">吸烟者：目前吸烟或戒烟时间小于一年</option>
                    <option value="曾经吸烟">曾经吸烟：有吸烟史但戒烟时间超过一年者</option>
                    <option value="不吸烟">不吸烟：从未吸烟或总吸烟量小于100支者</option>
                </select>
            </td>
            <td align="center">饮酒情况:</td>
            <td>
                <select size="1" name="motherDrink" id="showMotherDrink">
                    <option></option>
                    <option value="饮酒者">饮酒者：每周至少2个有效次，持续1年以上</option>
                    <option value="不饮酒者">没有达到这一标准者，为不饮酒者</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center" colspan="2">  <input type="submit" value="确认" class="btn btn-info"> </td>
            <td align="center" colspan="2">  <input type="button" value="取消" class="btn btn-info" onclick="cancel()"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
<script src="/thinkphp/Public/thirdPlug/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
    /*Ajax获取登录用户信息并显示*/
    $(function(){
        var medicalID=getUrlparm("medicalID");//拿到就诊号
        var url="showDetailInfo";
        $.post(url,{"medicalID":medicalID,"dataForm":"BaseInformation"},function(data){
            $("#showMotherName").attr("value",data.mothername);
            $("#showMotherBirthday").attr("value",data.motherbirthday);
            $("#showMotherHeight").attr("value",data.motherheight);
            $("#showMotherWeight").attr("value",data.motherweight);
            $("#showMotherPhone").attr("value",data.motherphone);
            $("#showMotherEmail").attr("value",data.motheremail);
            document.getElementById('showMotherEducation').value =data.mothereducation;
            document.getElementById('showMotherJob').value =data.motherjob;
            document.getElementById('showMotherSmoke').value =data.mothersmoke;
            document.getElementById('showMotherDrink').value =data.motherdrink;
        })
    })
</script>
</body>
</html>