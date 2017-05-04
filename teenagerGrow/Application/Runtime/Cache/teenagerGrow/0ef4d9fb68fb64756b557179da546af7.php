<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>孕期情况</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">

</head>
<body>

<form action="pregnancyHandle" method="post">
    <table align="center"  width="100%" class="messageInput" border="1">
        <tr>
            <td align="center">胎次:</td>
            <td>
                <select size="1" name="taici" id="showTaici">
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">5</option>
                    <option value="7">5</option>
                    <option value="8次以上">8次以上</option>
                </select>
            </td>

            <td align="center">产次:</td>
            <td>
                <select size="1" name="chanci" id="showChanci">
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="4胎以上">4胎以上</option>
                </select>
            </td>
            <td align="center">孕周:</td>
            <td>
                <select size="1" name="yunzhou" id="showYunzhou">
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
        </tr>

        <tr>
            <td align="center">同胞疾病:</td>
            <td>
                <select size="1" name="tbDisease" id="showTbDisease">
                    <option></option>
                    <option value="遗传性疾病">遗传性疾病</option>
                    <option value="智力低下">智力低下</option>
                    <option value="先天畸形">先天畸形</option>
                    <option value="没有">没有</option>
                </select>
            </td>

            <td align="center">同胞疾病种类:</td>
            <td>
                <input type="text" name="tbDiseaseType" id="showTbDiseaseType">
            </td>

            <td align="center">剧烈呕吐:</td>
            <td>
                <select size="1" name="vomit" id="showVomit">
                    <option></option>
                    <option value="有">有</option>
                    <option value="没有">没有</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">剧吐起始周:</td>
            <td>
               <select size="1" name="vomitStart" id="showVomitStart">
                  <option></option>
                  <option value="第1周">第1周</option>
                  <option value="第2周">第2周</option>
                  <option value="第3周">第3周</option>
                  <option value="第4周">第4周</option>
                  <option value="第5周">第5周</option>
                  <option value="第6周">第6周</option>
                  <option value="第7周">第7周</option>
                  <option value="第8周">第8周</option>
                  <option value="第9周">第9周</option>
                  <option value="第10周">第10周</option>
                  <option value="第11周">第11周</option>
                  <option value="第12周">第12周</option>
                  <option value="第13周">第13周</option>
                  <option value="第14周">第14周</option>
                  <option value="第15周">第15周</option>
                  <option value="15周以上">15周以上</option>
               </select>
            </td>

            <td align="center">剧吐终止周:</td>
            <td>
                <select size="1" name="vomitStop" id="showVomitStop">
                    <option></option>
                    <option value="第5周">第5周</option>
                    <option value="第6周">第6周</option>
                    <option value="第7周">第7周</option>
                    <option value="第8周">第8周</option>
                    <option value="第9周">第9周</option>
                    <option value="第10周">第10周</option>
                    <option value="第11周">第11周</option>
                    <option value="第12周">第12周</option>
                    <option value="第13周">第13周</option>
                    <option value="第14周">第14周</option>
                    <option value="第15周">第15周</option>
                    <option value="第16周">第16周</option>
                    <option value="第17周">第17周</option>
                    <option value="第18周">第18周</option>
                    <option value="第19周">第19周</option>
                    <option value="第20周">第20周</option>
                    <option value="第21周">第21周</option>
                    <option value="第22周">第22周</option>
                    <option value="第23周">第23周</option>
                    <option value="第24周">第24周</option>
                    <option value="第25周">第25周</option>
                    <option value="25周以上">25周以上</option>
                </select>
            </td>

            <td align="center">孕期工作时间:</td>
            <td>
                <select size="1" name="workTime" id="showWorkTime">
                    <option></option>
                    <option value="没有参加工作">没有参加工作</option>
                    <option value="小于1/3孕期">﹤1/3孕期</option>
                    <option value="1/3-2/3孕期">1/3-2/3孕期</option>
                    <option value="大于2/3孕期">﹥2/3孕期</option>
                    <option value="全部孕期">全部孕期</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">孕期锻炼:</td>
            <td>
                <select size="1" name="exercise" id="showExercise">
                    <option></option>
                    <option value="是">是</option>
                    <option value="不是">不是</option>
                </select>
            </td>

            <td align="center">每周锻炼次数:</td>
            <td>
                <select size="1" name="exerciseNumber" id="showExerciseNumber">
                    <option></option>
                    <option value="1-3次">1-3次</option>
                    <option value="4-6次">4-6次</option>
                    <option value="7-9次">7-9次</option>
                    <option value="10-12次">10-12次</option>
                    <option value="12次-14次">12-14次</option>
                    <option value="15次以上">15次以上</option>
                </select>
            </td>

            <td align="center">平均每次锻炼时间:</td>
            <td>
                <select size="1" name="exerciseTime" id="showExerciseTime">
                    <option></option>
                    <option value="15分钟及以下">15分钟及以下</option>
                    <option value="15-30分钟">15-30分钟</option>
                    <option value="30-45分钟">30-45分钟</option>
                    <option value="45-60分钟">45-60分钟</option>
                    <option value="60-90分钟">60-90分钟</option>
                    <option value="90-120分钟">90-120分钟</option>
                    <option value="120分钟以上">120分钟以上</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">孕前体重:</td>
            <td>
                <input type="text" name="weightBeforePreg" id="showWeightBeforePreg" placeholder="保留一位小数">KG
            </td>

            <td align="center">孕后体重:</td>
            <td>
                <input type="text" name="weightAfterPreg" id="showWeightAfterPreg" placeholder="保留一位小数">KG
            </td>

            <td align="center">孕前慢性病:</td>
            <td>
                <select size="1" name="chronicBeforePreg" id="showChronicBeforePreg">
                    <option></option>
                    <option value="有">有</option>
                    <option value="没有">没有</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">慢性病名称:</td>
            <td>
                <input type="text" name="chronicName" id="showChronicName">
            </td>

            <td align="center">孕期新疾病:</td>
            <td>
                <select size="1" name="newDisease" id="showNewDisease">
                    <option></option>
                    <option value="有">有</option>
                    <option value="没有">没有</option>
                </select>
            </td>

            <td align="center">疾病名称:</td>
            <td>
                <input type="text" name="diseaseName" id="showDiseaseName">
            </td>
        </tr>

        <tr>
            <td align="center">起病时间:</td>
            <td>
            <select size="1" name="diseaseStart" id="showDiseaseStart">
                <option></option>
                <option value="第1周">第1周</option>
                <option value="第2周">第2周</option>
                <option value="第3周">第3周</option>
                <option value="第4周">第4周</option>
                <option value="第5周">第5周</option>
                <option value="第6周">第6周</option>
                <option value="第7周">第7周</option>
                <option value="第8周">第8周</option>
                <option value="第9周">第9周</option>
                <option value="第10周">第10周</option>
                <option value="第11周">第11周</option>
                <option value="第12周">第12周</option>
                <option value="第13周">第13周</option>
                <option value="第14周">第14周</option>
                <option value="第15周">第15周</option>
                <option value="第16周">第16周</option>
                <option value="第17周">第17周</option>
                <option value="第18周">第18周</option>
                <option value="第19周">第19周</option>
                <option value="第20周">第20周</option>
                <option value="第21周">第21周</option>
                <option value="第22周">第22周</option>
                <option value="第23周">第23周</option>
                <option value="第24周">第24周</option>
                <option value="第25周">第25周</option>
                <option value="第26周">第26周</option>
                <option value="第27周">第27周</option>
                <option value="第28周">第28周</option>
                <option value="第29周">第29周</option>
                <option value="第30周">第30周</option>
                <option value="第31周">第31周</option>
                <option value="第32周">第32周</option>
                <option value="第33周">第33周</option>
                <option value="第34周">第34周</option>
                <option value="第35周">第35周</option>
                <option value="第36周">第36周</option>
                <option value="第37周">第37周</option>
                <option value="第38周">第38周</option>
                <option value="第39周">第39周</option>
                <option value="第40周">第40周</option>
            </select>
            </td>

            <td align="center">孕期用药:</td>
            <td>
                <select size="1" name="eatMedical" id="showEatMedical">
                    <option></option>
                    <option value="有">有</option>
                    <option value="没有">没有</option>
                </select>
            </td>

            <td align="center">孕期重大事件:</td>
            <td>
                <select size="1" name="severeEvent" id="showSevereEvent">
                    <option></option>
                    <option value="有">有</option>
                    <option value="没有">没有</option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="center">重大事件详情:</td>
            <td colspan="5"><textarea  name="lifeDetail" id="showLifeDetail" rows="5" cols="100"></textarea></td>
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
        var medicalID=getUrlparm("medicalID");//拿到就诊号
        var url="showDetailInfo";
        $.post(url,{"medicalID":medicalID,"dataForm":"DuringPregnancy"},function(data){
            document.getElementById('showTaici').value =data.taici;
            document.getElementById('showChanci').value =data.chanci;
            document.getElementById('showYunzhou').value =data.weekofpregnancy;
            document.getElementById('showTbDisease').value =data.tbdisease;
            document.getElementById('showTbDiseaseType').value =data.tbdiseasetype;
            document.getElementById('showVomit').value =data.heavyvomiting;
            document.getElementById('showVomitStart').value =data.weekofstartvomit;
            document.getElementById('showVomitStop').value =data.weekofendvomit;
            document.getElementById('showWorkTime').value =data.worktimeduringpregnancy;
            document.getElementById('showExercise').value =data.exerciseduringpregnancy;
            document.getElementById('showExerciseNumber').value =data.exercisenumberofweek;
            document.getElementById('showExerciseTime').value =data.aveexercisetime;
            document.getElementById('showWeightBeforePreg').value =data.weightbeforepregnancy;
            document.getElementById('showWeightAfterPreg').value =data.weightafterpregnancy;
            document.getElementById('showChronicBeforePreg').value =data.chronicdiseasebeforepregnancy;
            document.getElementById('showChronicName').value =data.chronicdiseasename;
            document.getElementById('showNewDisease').value =data.newdiseaseduringpregnancy;
            document.getElementById('showDiseaseName').value =data.newdiseasename;
            document.getElementById('showDiseaseStart').value =data.begintimeofnewdisease;
            document.getElementById('showEatMedical').value =data.eatmedicineduringpregnancy;
            document.getElementById('showSevereEvent').value =data.severeevent;
            document.getElementById('showLifeDetail').value =data.lifedetail;
        })
    })
</script>

</body>
</html>