<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>出生时数据</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">

</head>
<body>

<form action="childBornHandle" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">出生地点:</td>
            <td>
                <input type="text" name="bornPlace" id="showBornPlace">
            </td>

            <td align="center">出生方式:</td>
            <td>
                <select size="1" name="bornStyle" id="showBornStyle">
                    <option></option>
                    <option value="自然分娩">自然分娩</option>
                    <option value="胎吸助产">胎吸助产</option>
                    <option value="产钳助产">产钳助产</option>
                    <option value="剖宫产">剖宫产</option>
                </select>
            </td>
            <td align="center">母亲姓名:</td>
            <td>
                <input type="text" name="motherName"  id="showMotherName">
            </td>
        </tr>

        <tr>
            <td align="center">胎数:</td>
            <td>
                <select size="1" name="taishu" id="showTaishu">
                    <option></option>
                    <option value="单胞胎">单胞胎</option>
                    <option value="双胞胎或多胞胎">双胞胎或多胞胎</option>
                </select>
            </td>

            <td align="center">胎龄:</td>
            <td>
                <select size="1" name="tailing" id="showTailing">
                    <option></option>
                    <option value="35周及以下">35周及以下</option>
                    <option value="36周">36周</option>
                    <option value="37周">37周</option>
                    <option value="38周">38周</option>
                    <option value="39周">39周</option>
                    <option value="40周">40周</option>
                    <option value="41周">41周</option>
                    <option value="42周">42周</option>
                    <option value="43周">43周</option>
                    <option value="44周">43周</option>
                    <option value="45周及以上">45周及以上</option>
                </select>
            </td>

            <td align="center">体重:</td>
            <td>
                <input type="text" name="bornWeight" id="showBornWeight" placeholder="保留一位小数">(克)
            </td>
        </tr>

        <tr>
            <td align="center">身长:</td>
            <td>
                <input type="text" name="bornHeight" id="showBornHeight" placeholder="保留一位小数">(厘米)
            </td>
            <td align="center">头围:</td>
            <td>
                <input type="text" name="touwei" id="showTouwei" placeholder="保留一位小数">(厘米)
            </td>
            <td align="center">WGA:</td>
            <td>
                <select size="1" name="WGA" id="showWGA">
                <option></option>
                <option value="SGA">SGA</option>
                <option value="AGA">AGA</option>
                <option value="LGA">LGA</option>
                </select>
            </td>
        <tr>
            <td align="center">APGAR1:</td>
            <td>
                <input type="text" name="APGAR1" id="showAPGAR1">
            </td>
            <td align="center">APGAR5:</td>
            <td>
                <input type="text" name="APGAR5" id="showAPGAR5">
            </td>
            <td align="center">先天性疾病:</td>
            <td>
                <select size="1" name="bornDisease" id="showBornDisease">
                    <option></option>
                    <option value="有">有</option>
                    <option value="无">无</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">A10A:</td>
            <td>
                <input type="text" name="A10A" id="showA10A">
            </td>

            <td align="center">胎盘问题:</td>
            <td>
                <select size="1" name="taipanProblem" id="showTaipanProblem">
                    <option></option>
                    <option value="前置胎盘">前置胎盘</option>
                    <option value="胎盘早剥">胎盘早剥</option>
                    <option value="胎盘功能不良">胎盘功能不良</option>
                    <option value="胎盘钙化">胎盘钙化</option>
                    <option value="没有">没有</option>
                </select>
            </td>

            <td align="center">脐带问题:</td>
            <td>
                <select size="1" name="qidaiProblem" id="showQidaiProblem">
                    <option></option>
                    <option value="脐带过长">脐带过长</option>
                    <option value="脐带过细">脐带过细</option>
                    <option value="脐带扭转、打结">脐带扭转、打结</option>
                    <option value="绕颈圈">绕颈圈</option>
                    <option value="没有">没有</option>
                </select>
            </td>
       </tr>

        <tr>
            <td align="center">羊水问题:</td>
            <td>
                <select size="1" name="yangshuiProblem" id="showYangshuiProblem">
                    <option></option>
                    <option value="羊水过多">羊水过多</option>
                    <option value="羊水过少">羊水过少</option>
                    <option value="羊水1度混浊">羊水1度混浊</option>
                    <option value="羊水2度混浊">羊水2度混浊</option>
                    <option value="羊水3度混浊">羊水3度混浊</option>
                    <option value="没有">没有</option>
                </select>
            </td>

            <td align="center">新生儿ALT_A:</td>
            <td>
                <input type="text" name="ALT_A" id="showALT_A">U/l
            </td>

            <td align="center">新生儿APOA1_B:</td>
            <td>
                <input type="text" name="APOA1_B" id="showAPOA1_B">mg/dl
            </td>
        </tr>

        <tr>
            <td align="center">新生儿APOB_B:</td>
            <td>
                <input type="text" name="APOB_B" id="showAPOB_B">mg/dl
            </td>

            <td align="center">新生儿C肽_A:</td>
            <td>
                <input type="text" name="CT_A" id="showCT_A">nmol/l
            </td>

            <td align="center">新生儿糖化血红蛋白_A:</td>
            <td>
                <input type="text" name="GH_A" id="showGH_A">%
            </td>
        </tr>

        <tr>
            <td align="center">新生儿HDLCH_A:</td>
            <td>
                <input type="text" name="HDLCH_A" id="showHDLCH_A">mmol/l
            </td>

            <td align="center">新生儿超敏CRP:</td>
            <td>
                <input type="text" name="CRP" id="showCRP">mg/l
            </td>

            <td align="center">新生儿胰岛素_A:</td>
            <td>
                <input type="text" name="insulin_A" id="showInsulin_A">mu/l
            </td>
        </tr>

        <tr>
            <td align="center">新生儿LDLCH_A:</td>
            <td>
               <input type="text" name="LDLCH_A" id="showLDLCH_A">mmol/l
            </td>

            <td align="center">新生儿脂蛋白a_B:</td>
            <td>
               <input type="text" name="a_B" id="showA_B">mg/l
            </td>

            <td align="center">新生儿胆固醇_B:</td>
            <td>
              <input type="text" name="dgc_B" id="showDgc_B">mmol/l
            </td>
        </tr>
        <tr>
            <td align="center">新生儿甘油三酯_B:</td>
            <td>
                <input type="text" name="gysz_B" id="showGysz_B">mmol/l
            </td>

            <td align="center">新生儿尿酸_A:</td>
            <td>
                <input type="text" name="ns_A" id="showNs_A">μmol/l
            </td>

            <td align="center">新生儿血糖:</td>
            <td>
                <input type="text" name="bloodSugar" id="showBloodSugar">mmol/l
            </td>
        </tr>

        <tr>
            <td align="center">新生儿血红蛋白:</td>
            <td>
                <input type="text" name="hemoglobin" id="showHemoglobin">mmol/l
            </td>
        </tr>

        <tr>
            <td align="center" colspan="3">  <input type="submit" value="确认" class="btn btn-info"> </td>
            <td align="center" colspan="3">   <input type="button" value="取消" class="btn btn-info" onclick="cancel()"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>

<script>
    /*Ajax获取登录用户信息并显示*/
    $(function(){
        var url="showDetailInfo";
        $.post(url,{"dataForm":"ChildBorn"},function(data){
            document.getElementById('showBornPlace').value =data.bornplace;
            document.getElementById('showBornStyle').value =data.bornstyle;
            document.getElementById('showMotherName').value =data.mothername;
            document.getElementById('showTaishu').value =data.taishu;
            document.getElementById('showTailing').value =data.tailing;
            document.getElementById('showBornWeight').value =data.bornweight;
            document.getElementById('showBornHeight').value =data.bornheight;
            document.getElementById('showTouwei').value =data.touwei;
            document.getElementById('showWGA').value =data.wga;
            document.getElementById('showAPGAR1').value =data.apgar1;
            document.getElementById('showAPGAR5').value =data.apgar5;
            document.getElementById('showBornDisease').value =data.congenitaldisease;
            document.getElementById('showA10A').value =data.a10a;
            document.getElementById('showTaipanProblem').value =data.placentalproblem;
            document.getElementById('showQidaiProblem').value =data.umbilicalcordproblem;
            document.getElementById('showYangshuiProblem').value =data.afproblem;
            document.getElementById('showALT_A').value =data.alt_a;
            document.getElementById('showAPOA1_B').value =data.apoa1_b;
            document.getElementById('showAPOB_B').value =data.apob_b;
            document.getElementById('showCT_A').value =data.ct_a;
            document.getElementById('showGH_A').value =data.gh_a;
            document.getElementById('showHDLCH_A').value =data.hdlch_a;
            document.getElementById('showCRP').value =data.crp;
            document.getElementById('showInsulin_A').value =data.insulin_a;
            document.getElementById('showLDLCH_A').value =data.ldlch_a;
            document.getElementById('showA_B').value =data.a_b;
            document.getElementById('showDgc_B').value =data.cholesterol_b;
            document.getElementById('showGysz_B').value =data.triglyceride_b;
            document.getElementById('showNs_A').value =data.uricacid_a;
            document.getElementById('showBloodSugar').value =data.bloodsugar;
            document.getElementById('showHemoglobin').value =data.hemoglobin;

        })
    })
</script>
</body>
</html>