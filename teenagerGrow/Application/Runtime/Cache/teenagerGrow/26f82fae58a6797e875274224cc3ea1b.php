<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="screen" href="/teenagerGrow/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/teenagerGrow/Public/css/bootstrap.min.css">
    <title>儿童综合信息</title>
</head>
<body>

<!--网页头-->
<div id="webHead"></div>
    <div class="div1">
        <div class="top">
            <div class="lefttop"><span></span>儿童成长综合信息</div>
        </div>

        <div class="div3">
            <div class="left">
                <!--<iframe id="leftList" src="<?php echo U('LookChild/leftMenuView');?>" scrolling="no" frameborder="0"></iframe>-->
                <dl class="leftmenu">
                    <dd>
                        <div class="title">
                            <span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico01.png" /></span>基本信息
                        </div>
                        <ul class="menuson">
                            <li id="linkChildInfo" value="儿童信息"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('childBaseInformationView.html','#linkChildInfo')">儿童信息</a><i></i></li>
                            <li id="linkFatherInfo" value="父亲信息"><cite></cite> <a href="javascript:void(0);" onclick="redirectTolinkChild('fatherInfo.html','#linkFatherInfo')">父亲信息</a><i></i></li>
                            <li id="linkMotherInfo" value="母亲信息"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('motherInfo.html','#linkMotherInfo')" >母亲信息</a><i></i></li>
                        </ul>
                    </dd>

                    <dd>
                        <div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico04.png" /></span>家族病史</div>
                        <ul class="menuson">
                            <li id="linkFamilySick" value="家族病史"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('allChildFamilySick.html','#linkFamilySick')">家族病史</a><i></i></li>
                            <li id="linkNewFamilySick" value="新增病史"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addChildFamilySick.html','#linkNewFamilySick')">新增病史</a><i></i></li>
                        </ul>
                    </dd>

                    <dd>
                        <div class="title">
                            <span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico02.png"  /></span>出生前数据
                        </div>
                        <ul class="menuson">
                            <li id="linkPregnancyMes" value="孕期情况"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('pregnancySituation.html','#linkPregnancyMes')">孕期情况</a><i></i></li>
                            <li id="linkPregnancyCheck" value="检查记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('allPregnancyRecord.html','#linkPregnancyCheck')">检查记录</a><i></i></li>
                            <li id="linkNewPregnancyCheck" value="新增记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addPregnancyRecord.html','#linkNewPregnancyCheck')">新增记录</a><i></i></li>
                        </ul>
                    </dd>

                    <dd>
                        <div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico03.png" /></span>出生时数据</div>
                        <ul class="menuson">
                            <li id="linkChildBorn" value="出生数据"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('childBornView.html','#linkChildBorn')">出生数据</a><i></i></li>
                        </ul>
                    </dd>

                    <dd><div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico04.png"  /></span>新生婴儿访视数据</div>
                        <ul class="menuson">
                            <li id="linkChildVisit" value="访视记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('allBabyVisitRecord.html','#linkChildVisit')">访视记录</a><i></i></li>
                            <li id="linkNewChildVisit" value="新增记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addBabyVisitRecord.html','#linkNewChildVisit')">新增记录</a><i></i></li>
                        </ul>
                    </dd>

                    <dd><div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico01.png"  /></span>0-3岁数据</div>
                        <ul class="menuson">
                            <li id="linkThreeCheck" value="0-3岁体检记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('allUnderThreeRecord.html','#linkThreeCheck')">体检记录</a><i></i></li>
                            <li id="linkNewThreeCheck" value="新增记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addUnderThreeCheckRecord.html','#linkNewThreeCheck')">新增记录</a><i></i></li>
                        </ul>
                    </dd>

                    <dd><div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico02.png"  /></span>学龄前数据</div>
                        <ul class="menuson">
                            <li id="linkSchoolBeforeCheck" value="学龄前体检记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('allSchoolBeforeRecord.html','#linkSchoolBeforeCheck')">体检记录</a><i></i></li>
                            <li id="linkNewSchoolBeforeCheck" value="新增记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addSchoolBeforeCheckRecord.html','#linkNewSchoolBeforeCheck')">新增记录</a><i></i></li>
                        </ul>
                    </dd>

                    <dd><div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico03.png"  /></span>学龄期数据</div>
                        <ul class="menuson">
                            <li id="linkSchoolCheck" value="学龄期体检记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('allSchoolRecord.html','#linkSchoolCheck')">体检记录</a><i></i></li>
                            <li id="linkNewSchoolCheck" value="新增记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addSchoolCheckRecord.html','#linkNewSchoolCheck')">新增记录</a><i></i></li>
                        </ul>
                    </dd>

                    <dd><div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico04.png"  /></span>青春期数据</div>
                        <ul class="menuson">
                            <li id="linkAdolesCheck" value="青春期体检记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('allAdolesRecord.html','#linkAdolesCheck')">体检记录</a><i></i></li>
                            <li id="linkNewAdolesCheck" value="新增记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addAdolesCheckRecord.html','#linkNewAdolesCheck')">新增记录</a><i></i></li>
                        </ul>
                    </dd>

                    <dd><div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico01.png"  /></span>患病记录</div>
                        <ul class="menuson">
                            <li id="linkSickRecord" value="患病记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('allSickRecord.html','#linkSickRecord')">患病记录</a><i></i></li>
                            <li id="linkNewSickRecord" value="新增记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addSickRecord.html','#linkNewSickRecord')">新增记录</a><i></i></li>
                        </ul>
                    </dd>

                    <dd><div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico02.png"  /></span>相关图片</div>
                        <ul class="menuson">
                            <li id="linkUpImage" value="上传图片"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('addPhoto.html','#linkUpImage')">上传图片</a><i></i></li>
                            <li id="linkViewImage" value="查看图片"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('viewPhoto.html','#linkViewImage')">查看图片</a><i></i></li>
                        </ul>
                    </dd>

                    <dd><div class="title"><span><img src="/teenagerGrow/Public/others/teenagerGrow/images/leftico03.png"  /></span>身高体重图表</div>
                        <ul class="menuson">
                            <li id="linkViewHeightAndWeight" value="数据列表"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../HeightAndWeight/viewHeightAndWeight.html','#linkViewHeightAndWeight')">数据列表</a><i></i></li>
                            <li id="linkHeightAndWeightTable" value="曲线图表"><cite></cite><a href="javascript:void(0);" onclick="redirectToChildTable()">曲线图表</a><i></i></li>
                        </ul>
                    </dd>


                </dl>
            </div>
            <div class="right">
                <div class="right1">
                    <div class="rightTop"></div>
                </div>
                <div class="right2">
                    <div class="bottom1" style="visibility: hidden"></div>
                    <div class="bottom2"></div>
                </div>
            </div>

            </div>
        </div>
    </div>

<script src="/teenagerGrow/Public/js/jquery-2.1.1.min.js"></script>
<script src="/teenagerGrow/Public/js/teenagerGrow/usedFounctions.js"></script>

<script>
    $(function(){
        $("#webHead").load("<?php echo U('Login/webHead');?>");
    })
    $(document).ready(function(){
        //导航切换
        $(".menuson li").click(function(){
            $(".menuson li.active").removeClass("active")
            $(this).addClass("active");
        });
        //下拉框的显示与隐藏
        $('.title').click(function(){
            $(this).next('ul').slideToggle()
                    .parent().siblings().find("ul").slideUp();
        });

    })
    /*将查看的就诊号信息传递给右侧显示页面*/
    function redirectTolinkChild(url,id){
        var text=$(id).attr("value");
        $(".div1 .div3 .right1").html(text);
        $(".div1 .div3 .right2 .bottom2").load(url);
        //隐藏左侧体检记录的日期下拉框
        $(".div1 .div3 .right2 .bottom1").css("visibility","hidden");
    };
    /*显示对应的身高或者体重图表*/
    function jumpToBelow(parm){
        var sex=getUrlparm("sex");//获取儿童的性别
        var name=getUrlparm("name");//获取儿童的性别
        switch(sex){
            case "1":{
                if(parm=="height"){
//                    $(".div1 .div3 .right2 .bottom2").load("<?php echo U('HeightAndWeight/boyHeightChart');?>");
                    window.open("<?php echo U('HeightAndWeight/boyHeightChart');?>");
                }else{
//                    $(".div1 .div3 .right2 .bottom2").load("<?php echo U('HeightAndWeight/boyWeightChart');?>");
                    window.open("<?php echo U('HeightAndWeight/boyWeightChart');?>");
                }
                break;
            }
            case "2":{
                if(parm=="height"){
//                    $(".div1 .div3 .right2 .bottom2").load("<?php echo U('HeightAndWeight/girlHeightChart');?>");
                    window.open("<?php echo U('HeightAndWeight/girlHeightChart');?>");
                }else{
//                    $(".div1 .div3 .right2 .bottom2").load("<?php echo U('HeightAndWeight/girlWeightChart');?>");
                    window.open("<?php echo U('HeightAndWeight/girlWeightChart');?>");
                }
            }
        }
    }
    /*跳转到身高或体重图表选择*/
    function redirectToChildTable(){
        var text=$('<div class="linkTop"><ul class="nav nav-pills bg-info"><li class=""><a href="#" onclick="jumpToBelow(\'height\')"><button style="background: darkgray">身高曲线图</button></a></li> <li><a href="#" onclick="jumpToBelow(\'weight\')"><button style="background: darkgray">体重曲线图</button></a></li></ul></div>')
        var image=$('<img src="/teenagerGrow/Public/others/teenagerGrow/images/height.jpg"><img src="/teenagerGrow/Public/others/teenagerGrow/images/weight.jpg">');
        $(".div1 .div3 .right1").html(text);
        $(".div1 .div3 .right2 .bottom2").html(image);
    }
</script>
</body>
</html>