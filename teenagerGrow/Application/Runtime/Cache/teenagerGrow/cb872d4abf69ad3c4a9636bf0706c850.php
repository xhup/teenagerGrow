<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>0-3岁体检记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">

</head>
<body>

<form id="underThreeCheckRecordForm" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">检查日期:</td>
            <td><input type="text" name="checkDate" width="20" readonly="readonly" id="showUnderThreeCheckDate" style="background-color: #9d9d9d"></td>
            <td align="center">年龄(月):</td>
            <td>
                <select size="1" name="age" id="showUnderThreeAge">
                    <option value="3个月">3个月</option>
                    <option value="6个月">6个月</option>
                    <option value="9个月">9个月</option>
                    <option value="12个月">12个月</option>
                    <option value="18个月">18个月</option>
                    <option value="24个月">24个月</option>
                    <option value="30个月">30个月</option>
                    <option value="36个月">36个月</option>
                </select>
            </td>
            <td align="center">体检机构:</td>
            <td><input type="text" name="checkPlace" width="20" id="showUnderThreeCheckPlace"></td>
        </tr>

        <tr>
            <td align="center">体检人员:</td>
            <td><input type="text" name="checkPersonName" width="20" id="showUnderThreeCheckPersonName"></td>
            <td align="center">职称:</td>
            <td><input type="text" name="checkPersonTitle" width="20" id="showUnderThreeCheckPersonTitle"></td>
            <td align="center">体重:</td>
            <td><input type="text" name="weight" width="20" id="showUnderThreeWeight" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">体重等级:</td>
            <td><input type="text" name="weightRank" width="20" id="showUnderThreeWeightRank"></td>
            <td align="center">身高:</td>
            <td><input type="text" name="height" width="20" id="showUnderThreeHeight" placeholder="保留1位小数"></td>
            <td align="center">身高等级:</td>
            <td><input type="text" name="heightRank" width="20" id="showUnderThreeHeightRank"></td>
        </tr>

        <tr>
            <td align="center">头围:</td>
            <td><input type="text" name="touwei" width="20" id="showUnderThreeTouwei" placeholder="保留1位小数"></td>
            <td align="center">胸围:</td>
            <td><input type="text" name="xiongwei" width="20" id="showUnderThreeXiongwei" placeholder="保留1位小数"></td>
            <td align="center">腹围:</td>
            <td><input type="text" name="fuwei" width="20" id="showUnderThreeFuwei" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">前囱:</td>
            <td><input type="text" name="qiancong" width="20" id="showUnderThreeQiancong" placeholder="保留1位小数"></td>
            <td align="center">面色:</td>
            <td><input type="text" name="complexion" width="20" id="showUnderThreeComplexion"></td>
            <td align="center">上臂围:</td>
            <td><input type="text" name="shangbiwei" width="20" id="showUnderThreeShangbiwei" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">腹部皮褶:</td>
            <td><input type="text" name="fubuFold" width="20" id="showUnderThreeFubuFold"></td>
            <td align="center">出牙数目:</td>
            <td><input type="text" name="teethNumber" width="20" id="showUnderThreeTeethNumber"></td>
            <td align="center">佝偻病体征:</td>
            <td><input type="text" name="signOfRickets" width="20" id="showUnderThreeSignOfRickets"></td>
        </tr>

        <tr>
            <td align="center">贫血体征:</td>
            <td><input type="text" name="signOfAnemia" width="20" id="showUnderThreeSignOfAnemia"></td>
            <td align="center">心肺:</td>
            <td><input type="text" name="heartAndLung" width="20" id="showUnderThreeHeartAndLung"></td>
            <td align="center">腹部:</td>
            <td><input type="text" name="abdomen" width="20" id="showUnderThreeAbdomen"></td>
        </tr>

        <tr>
            <td align="center">四肢:</td>
            <td><input type="text" name="limb" width="20" id="showUnderThreeLimb"></td>
            <td align="center">喂养情况:</td>
            <td><input type="text" name="feedCondition" width="20" id="showUnderThreeFeedCondition"></td>
            <td align="center">睡眠情况:</td>
            <td><input type="text" name="sleepCondition" width="20" id="showUnderThreeSleepCondition"></td>
        </tr>

        <tr>
            <td align="center">血常规:</td>
            <td><input type="text" name="bloodRoutine" width="20" id="showUnderThreeBloodRoutine"></td>
            <td align="center">肝功能:</td>
            <td><input type="text" name="liverFunction" width="20" id="showUnderThreeLiverFunction"></td>
            <td align="center">大便常规:</td>
            <td><input type="text" name="stoolRoutine" width="20" id="showUnderThreeStoolRoutine"></td>
        </tr>

        <tr>
            <td align="center">健康教育:</td>
            <td><input type="text" name="healthyEducation" width="20" id="showUnderThreeHealthyEducation"></td>
            <td align="center">预防接种:</td>
            <td><input type="text" name="vaccination" width="20" id="showUnderThreeVaccination"></td>
        </tr>

        <tr>
            <td align="center" colspan="3">  <input type="submit" value="修改" class="btn btn-info" onclick="modifyRecord('underThreeCheckRecordForm','underThreeCheckHandle')"> </td>
            <td align="center" colspan="3">  <input type="submit" value="删除" class="btn btn-info" onclick="deleteRecord('underThreeCheckRecordForm','showUnderThreeCheckDate','tg_three_before')"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
<script>
    /*Ajax获取登录用户信息并显示*/
    $(function(){
        var url="showDetailRecord";
        $.post(url,{"dataForm":"ThreeBefore"},function(data){
            document.getElementById('showUnderThreeCheckDate').value =data.checkdate;
            document.getElementById('showUnderThreeAge').value =data.age;
            document.getElementById('showUnderThreeCheckPlace').value =data.checkplace;
            document.getElementById('showUnderThreeCheckPersonName').value =data.checkpersonname;
            document.getElementById('showUnderThreeCheckPersonTitle').value =data.checkpersontitle;
            document.getElementById('showUnderThreeWeight').value =data.babyweight;
            document.getElementById('showUnderThreeWeightRank').value =data.weightrank;
            document.getElementById('showUnderThreeHeight').value =data.babyheight;
            document.getElementById('showUnderThreeHeightRank').value =data.heightrank;
            document.getElementById('showUnderThreeTouwei').value =data.touwei;
            document.getElementById('showUnderThreeXiongwei').value =data.xiongwei;
            document.getElementById('showUnderThreeFuwei').value =data.fuwei;
            document.getElementById('showUnderThreeQiancong').value =data.qiancong;
            document.getElementById('showUnderThreeComplexion').value =data.complexion;
            document.getElementById('showUnderThreeShangbiwei').value =data.shangbiwei;
            document.getElementById('showUnderThreeFubuFold').value =data.abdominalfold;
            document.getElementById('showUnderThreeTeethNumber').value =data.teethnumber;
            document.getElementById('showUnderThreeSignOfRickets').value =data.signofrickets;
            document.getElementById('showUnderThreeSignOfAnemia').value =data.signofanemia;
            document.getElementById('showUnderThreeHeartAndLung').value =data.heartandlung;
            document.getElementById('showUnderThreeAbdomen').value =data.abdomen;
            document.getElementById('showUnderThreeLimb').value =data.limb;
            document.getElementById('showUnderThreeFeedCondition').value =data.feedcondition;
            document.getElementById('showUnderThreeSleepCondition').value =data.sleepcondition;
            document.getElementById('showUnderThreeBloodRoutine').value =data.bloodroutine;
            document.getElementById('showUnderThreeLiverFunction').value =data.liverfunction;
            document.getElementById('showUnderThreeStoolRoutine').value =data.stoolroutine;
            document.getElementById('showUnderThreeHealthyEducation').value =data.healthyeducation;
            document.getElementById('showUnderThreeVaccination').value =data.vaccination;
        })
    })
</script>

</body>
</html>