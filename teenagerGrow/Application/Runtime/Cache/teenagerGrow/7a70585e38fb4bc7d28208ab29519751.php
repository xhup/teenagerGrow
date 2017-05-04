<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>儿童访视记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">

</head>
<body>

<form id="babyVisitRecordForm" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">日期:</td>
            <td><input type="text" name="visitDate" width="20" id="showVisitDate" readonly="readonly" style="background-color: #9d9d9d"></td>
            <td align="center">地点:</td>
            <td><input type="text" name="visitPlace" width="20" id="showVisitPlace"></td>
            <td align="center">访视人员姓名:</td>
            <td><input type="text" name="visitPersonName" width="20" id="showVisitPersonName"></td>
        </tr>

        <tr>
            <td align="center">所在医疗机构:</td>
            <td><input type="text" name="fromMedical" width="20" id="showFromMedical"></td>
            <td align="center">专业:</td>
            <td><input type="text" name="major" width="20" id="showMajor"></td>
            <td align="center">职称:</td>
            <td><input type="text" name="title" width="20" id="showTitle"></td>
        </tr>

        <tr>
            <td align="center">接受访视人:</td>
            <td><input type="text" name="receptionPerson" width="20" id="showReceptionPerson"></td>
            <td align="center">身份:</td>
            <td><input type="text" name="identity" width="20" id="showIdentity"></td>
            <td align="center">家居环境:</td>
            <td><input type="text" name="homeEnvironment" width="20" id="showHomeEnvironment"></td>
        </tr>

        <tr>
            <td align="center">出生时情况:</td>
            <td><input type="text" name="bornSituation" width="20" id="showBornSituation"></td>
            <td align="center">预防接种情况:</td>
            <td><input type="text" name="vaccinateSituation" width="20" id="showVaccinateSituation"></td>
            <td align="center">新生儿疾病筛查情况:</td>
            <td><input type="text" name="diseaseCheck" width="20" id="showDiseaseCheck"></td>
        </tr>

        <tr>
            <td align="center">甲地:</td>
            <td><input type="text" name="jiadi" width="20" id="showJiadi"></td>
            <td align="center">PKU:</td>
            <td><input type="text" name="PKU" width="20" id="showPKU"></td>
            <td align="center">喂养方式:</td>
            <td><input type="text" name="feedStyle" width="20" id="showFeedStyle"></td>
        </tr>

        <tr>
            <td align="center">喂养次数:</td>
            <td><input type="text" name="feedNumber" width="20" id="showFeedNumber"></td>
            <td align="center">喂养量:</td>
            <td><input type="text" name="feedAmount" width="20" id="showFeedAmount"></td>
            <td align="center">有无吐奶:</td>
            <td>
                <select size="1" name="spitMilk" id="showSpitMilk">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">睡眠时间(小时):</td>
            <td><input type="text" name="sleepTime" width="20" id="showSleepTime"></td>
            <td align="center">有无惊跳:</td>
            <td>
                <select size="1" name="startle" id="showStartle">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">有无哭闹:</td>
            <td>
                <select size="1" name="cry" id="showCry">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">有无抽搐:</td>
            <td>
                <select size="1" name="twitch" id="showTwitch">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">大便次数:</td>
            <td><input type="text" name="shitNumber" width="20" id="showShitNumber"></td>
            <td align="center">颜色:</td>
            <td><input type="text" name="shitColor" width="20" id="showShitColor"></td>
        </tr>

        <tr>
            <td align="center">性状:</td>
            <td><input type="text" name="shitShape" width="20" id="showShitShape"></td>
            <td align="center">有无粘液:</td>
            <td>
                <select size="1" name="mucus" id="showMucus">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">有无脓血:</td>
            <td>
                <select size="1" name="pusAndBlood" id="showPusAndBlood">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">有无奶瓣:</td>
            <td>
                <select size="1" name="valve" id="showValve">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">发育情况:</td>
            <td><input type="text" name="growSituation" width="20" id="showGrowSituation"></td>
            <td align="center">黄疸情况:</td>
            <td><input type="text" name="jaundiceSituation" width="20" id="showJaundiceSituation"></td>
        </tr>

        <tr>
            <td align="center">脐部情况:</td>
            <td><input type="text" name="navelSituation" width="20" id="showNavelSituation"></td>
            <td align="center">口腔发育:</td>
            <td><input type="text" name="oralCavity" width="20" id="showOralCavity"></td>
            <td align="center">有无唇裂:</td>
            <td>
                <select size="1" name="harelip" id="showHarelip">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">有无腭裂:</td>
            <td>
                <select size="1" name="cleftpalate" id="showCleftpalate">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">出生体重:</td>
            <td><input type="text" name="bornWeight" width="20" id="showBornWeight" placeholder="保留一位小数"></td>
            <td align="center">访视时体重:</td>
            <td><input type="text" name="visitWeight" width="20" id="showVisitWeight" placeholder="保留一位小数"></td>
        </tr>

        <tr>
            <td align="center">出生身长:</td>
            <td><input type="text" name="bornHeight" width="20" id="showBornHeight" placeholder="保留一位小数"></td>
            <td align="center">访视时身长:</td>
            <td><input type="text" name="visitHeight" width="20" id="showVisitHeight" placeholder="保留一位小数"></td>
            <td align="center">出生头围:</td>
            <td><input type="text" name="bornTouwei" width="20" id="showBornTouwei" placeholder="保留一位小数"></td>
        </tr>

        <tr>
            <td align="center">访视时头围:</td>
            <td><input type="text" name="visitTouwei" width="20" id="showVisitTouwei" placeholder="保留一位小数"></td>
            <td align="center">前囟:</td>
            <td><input type="text" name="qiancong" width="20" id="showQiancong" placeholder="保留一位小数"></td>
            <td align="center">颅缝:</td>
            <td><input type="text" name="lufeng" width="20" id="showLufeng"></td>
        </tr>

        <tr>
            <td align="center">后囟:</td>
            <td><input type="text" name="houcong" width="20" id="showHoucong" placeholder="保留一位小数"></td>
            <td align="center">头皮血肿:</td>
            <td><input type="text" name="toupixuezhong" width="20" id="showToupixuezhong"></td>
            <td align="center">有无产伤:</td>
            <td>
                <select size="1" name="chanshang" id="showChanshang">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">肤色:</td>
            <td><input type="text" name="skinColor" width="20" id="showSkinColor"></td>
            <td align="center">体温:</td>
            <td><input type="text" name="temperature" width="20" id="showTemperature"></td>
            <td align="center">呼吸:</td>
            <td><input type="text" name="breath" width="20" id="showBreath"></td>
        </tr>

        <tr>
            <td align="center">心率:</td>
            <td><input type="text" name="heartRate" width="20" id="showHeartRate"></td>
            <td align="center">心脏听诊:</td>
            <td><input type="text" name="heartCheck" width="20" id="showHeartCheck"></td>
            <td align="center">肺部听诊:</td>
            <td><input type="text" name="lungCheck" width="20" id="showLungCheck"></td>
        </tr>

        <tr>
            <td align="center">腹部触诊:</td>
            <td><input type="text" name="abdomenCheck" width="20" id="showAbdomenCheck"></td>
            <td align="center">生殖器畸形:</td>
            <td><input type="text" name="genitalMal" width="20" id="showGenitalMal"></td>
            <td align="center">四肢活动度:</td>
            <td><input type="text" name="limbActivity" width="20" id="showLimbActivity"></td>
        </tr>

        <tr>
            <td align="center" colspan="3">  <input type="submit" value="修改" class="btn btn-info" onclick="modifyRecord('babyVisitRecordForm','babyVisitHandle')"> </td>
            <td align="center" colspan="3">  <input type="submit" value="删除" class="btn btn-info" onclick="deleteRecord('babyVisitRecordForm','showVisitDate','tg_baby_visit')"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>

<script>
    /*Ajax获取登录用户信息并显示*/
    $(function(){
        var url="showCheckRecord";
        $.post(url,{"dataForm":"BabyVisit"},function(data){
            document.getElementById('showVisitDate').value =data.checkdate;
            document.getElementById('showVisitPlace').value =data.visitplace;
            document.getElementById('showVisitPersonName').value =data.visitpersonname;
            document.getElementById('showFromMedical').value =data.frommedical;
            document.getElementById('showMajor').value =data.major;
            document.getElementById('showTitle').value =data.title;
            document.getElementById('showReceptionPerson').value =data.receptionperson;
            document.getElementById('showIdentity').value =data.identity;
            document.getElementById('showHomeEnvironment').value =data.homeenvironment;
            document.getElementById('showBornSituation').value =data.bornsituation;
            document.getElementById('showVaccinateSituation').value =data.vaccinatesituation;
            document.getElementById('showDiseaseCheck').value =data.diseasecheck;
            document.getElementById('showJiadi').value =data.jiadi;
            document.getElementById('showPKU').value =data.pku;
            document.getElementById('showFeedStyle').value =data.feedstyle;
            document.getElementById('showFeedNumber').value =data.feednumber;
            document.getElementById('showFeedAmount').value =data.feedamount;
            document.getElementById('showSpitMilk').value =data.spitmilk;
            document.getElementById('showSleepTime').value =data.sleeptime;
            document.getElementById('showStartle').value =data.startle;
            document.getElementById('showCry').value =data.cry;
            document.getElementById('showTwitch').value =data.twitch;
            document.getElementById('showShitNumber').value =data.shitnumber;
            document.getElementById('showShitColor').value =data.shitcolor;
            document.getElementById('showShitShape').value =data.shitshape;
            document.getElementById('showMucus').value =data.mucus;
            document.getElementById('showPusAndBlood').value =data.pusandblood;
            document.getElementById('showValve').value =data.valve;
            document.getElementById('showGrowSituation').value =data.growsituation;
            document.getElementById('showJaundiceSituation').value =data.jaundicesituation;
            document.getElementById('showNavelSituation').value =data.navelsituation;
            document.getElementById('showOralCavity').value =data.oralcavity;
            document.getElementById('showHarelip').value =data.harelip;
            document.getElementById('showCleftpalate').value =data.cleftpalate;
            document.getElementById('showBornWeight').value =data.bornweight;
            document.getElementById('showVisitWeight').value =data.visitweight;
            document.getElementById('showBornHeight').value =data.bornheight;
            document.getElementById('showVisitHeight').value =data.visitheight;
            document.getElementById('showBornTouwei').value =data.borntouwei;
            document.getElementById('showVisitTouwei').value =data.visittouwei;
            document.getElementById('showQiancong').value =data.qiancong;
            document.getElementById('showLufeng').value =data.lufeng;
            document.getElementById('showHoucong').value =data.houcong;
            document.getElementById('showToupixuezhong').value =data.toupixuezhong;
            document.getElementById('showChanshang').value =data.chanshang;
            document.getElementById('showSkinColor').value =data.skincolor;
            document.getElementById('showTemperature').value =data.temperature;
            document.getElementById('showBreath').value =data.breath;
            document.getElementById('showHeartRate').value =data.heartrate;
            document.getElementById('showHeartCheck').value =data.heartcheck;
            document.getElementById('showLungCheck').value =data.lungcheck;
            document.getElementById('showAbdomenCheck').value =data.abdomencheck;
            document.getElementById('showGenitalMal').value =data.genitalmal;
            document.getElementById('showLimbActivity').value =data.limbactivity;
        })
    })
</script>

</body>
</html>