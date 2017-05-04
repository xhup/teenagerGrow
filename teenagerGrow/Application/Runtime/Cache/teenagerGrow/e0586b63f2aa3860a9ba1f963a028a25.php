<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增婴儿访视记录</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
</head>
<body>

<form action="addBabyVisitRecordHandle" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">日期:</td>
            <td><input type="text" name="visitDate" width="20" placeholder="必填项" data-provide="datepicker" class="datepicker"></td>
            <td align="center">地点:</td>
            <td><input type="text" name="visitPlace" width="20"></td>
            <td align="center">访视人员姓名:</td>
            <td><input type="text" name="visitPersonName" width="20"></td>
        </tr>

        <tr>
            <td align="center">所在医疗机构:</td>
            <td><input type="text" name="fromMedical" width="20"></td>
            <td align="center">专业:</td>
            <td><input type="text" name="major" width="20"></td>
            <td align="center">职称:</td>
            <td><input type="text" name="title" width="20"></td>
        </tr>

        <tr>
            <td align="center">接受访视人:</td>
            <td><input type="text" name="receptionPerson" width="20"></td>
            <td align="center">身份:</td>
            <td><input type="text" name="identity" width="20"></td>
            <td align="center">家居环境:</td>
            <td><input type="text" name="homeEnvironment" width="20"></td>
        </tr>

        <tr>
            <td align="center">出生时情况:</td>
            <td><input type="text" name="bornSituation" width="20"></td>
            <td align="center">预防接种情况:</td>
            <td><input type="text" name="vaccinateSituation" width="20"></td>
            <td align="center">新生儿疾病筛查情况:</td>
            <td><input type="text" name="diseaseCheck" width="20"></td>
        </tr>

        <tr>
            <td align="center">甲地:</td>
            <td><input type="text" name="jiadi" width="20"></td>
            <td align="center">PKU:</td>
            <td><input type="text" name="PKU" width="20"></td>
            <td align="center">喂养方式:</td>
            <td><input type="text" name="feedStyle" width="20"></td>
        </tr>

        <tr>
            <td align="center">喂养次数:</td>
            <td><input type="text" name="feedNumber" width="20"></td>
            <td align="center">喂养量:</td>
            <td><input type="text" name="feedAmount" width="20"></td>
            <td align="center">有无吐奶:</td>
            <td>
                <select size="1" name="spitMilk">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">睡眠时间(小时):</td>
            <td><input type="text" name="sleepTime" width="20"></td>
            <td align="center">有无惊跳:</td>
            <td>
                <select size="1" name="startle">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">有无哭闹:</td>
            <td>
                <select size="1" name="cry">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">有无抽搐:</td>
            <td>
                <select size="1" name="twitch">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">大便次数:</td>
            <td><input type="text" name="shitNumber" width="20"></td>
            <td align="center">颜色:</td>
            <td><input type="text" name="shitColor" width="20"></td>
        </tr>

        <tr>
            <td align="center">性状:</td>
            <td><input type="text" name="shitShape" width="20"></td>
            <td align="center">有无粘液:</td>
            <td>
                <select size="1" name="mucus">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">有无脓血:</td>
            <td>
                <select size="1" name="pusAndBlood">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">有无奶瓣:</td>
            <td>
                <select size="1" name="valve">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">发育情况:</td>
            <td><input type="text" name="growSituation" width="20"></td>
            <td align="center">黄疸情况:</td>
            <td><input type="text" name="jaundiceSituation" width="20"></td>
        </tr>

        <tr>
            <td align="center">脐部情况:</td>
            <td><input type="text" name="navelSituation" width="20"></td>
            <td align="center">口腔发育:</td>
            <td><input type="text" name="oralCavity" width="20"></td>
            <td align="center">有无唇裂:</td>
            <td>
                <select size="1" name="harelip">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">有无腭裂:</td>
            <td>
                <select size="1" name="cleftpalate">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
            <td align="center">出生体重:</td>
            <td><input type="text" name="bornWeight" width="20" placeholder="保留1位小数"></td>
            <td align="center">访视时体重:</td>
            <td><input type="text" name="visitWeight" width="20" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">出生身长:</td>
            <td><input type="text" name="bornHeight" width="20" placeholder="保留1位小数"></td>
            <td align="center">访视时身长:</td>
            <td><input type="text" name="visitHeight" width="20" placeholder="保留1位小数"></td>
            <td align="center">出生头围:</td>
            <td><input type="text" name="bornTouwei" width="20" placeholder="保留1位小数"></td>
        </tr>

        <tr>
            <td align="center">访视时头围:</td>
            <td><input type="text" name="visitTouwei" width="20" placeholder="保留1位小数"></td>
            <td align="center">前囟:</td>
            <td><input type="text" name="qiancong" width="20" placeholder="保留1位小数"></td>
            <td align="center">颅缝:</td>
            <td><input type="text" name="lufeng" width="20"></td>
        </tr>

        <tr>
            <td align="center">后囟:</td>
            <td><input type="text" name="houcong" width="20" placeholder="保留1位小数"></td>
            <td align="center">头皮血肿:</td>
            <td><input type="text" name="toupixuezhong" width="20"></td>
            <td align="center">有无产伤:</td>
            <td>
                <select size="1" name="chanshang">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">肤色:</td>
            <td><input type="text" name="skinColor" width="20"></td>
            <td align="center">体温:</td>
            <td><input type="text" name="temperature" width="20"></td>
            <td align="center">呼吸:</td>
            <td><input type="text" name="breath" width="20"></td>
        </tr>

        <tr>
            <td align="center">心率:</td>
            <td><input type="text" name="heartRate" width="20"></td>
            <td align="center">心脏听诊:</td>
            <td><input type="text" name="heartCheck" width="20"></td>
            <td align="center">肺部听诊:</td>
            <td><input type="text" name="lungCheck" width="20"></td>
        </tr>

        <tr>
            <td align="center">腹部触诊:</td>
            <td><input type="text" name="abdomenCheck" width="20"></td>
            <td align="center">生殖器畸形:</td>
            <td><input type="text" name="genitalMal" width="20"></td>
            <td align="center">四肢活动度:</td>
            <td><input type="text" name="limbActivity" width="20"></td>
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