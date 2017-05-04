<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">

<dl class="leftmenu">
    <dd>
        <div class="title">
            <span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico01.png" /></span>基本信息
        </div>
        <ul class="menuson">
            <li id="linkChildInfo" value="儿童信息"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('showDetailInfo','linkChildInfo')">儿童信息</a><i></i></li>
            <li id="linkFatherInfo" value="父亲信息"><cite></cite> <a href="javascript:void(0);" onclick="redirectTolinkChild('../view/fatherInfo.php?medicalID=','linkFatherInfo')">父亲信息</a><i></i></li>
            <li id="linkMotherInfo" value="母亲信息"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/motherInfo.php?medicalID=','linkMotherInfo')" >母亲信息</a><i></i></li>
       </ul>
    </dd>


    <dd>
        <div class="title">
            <span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico02.png"  /></span>出生前数据
        </div>
        <ul class="menuson">
            <li id="linkPregnancyMes" value="孕期情况"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/pregnancySituation.php?medicalID=','linkPregnancyMes')">孕期情况</a><i></i></li>
            <li id="linkPregnancyCheck" value="孕期检查"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/addPregnancyRecord.php?medicalID=','linkPregnancyCheck')">孕期检查</a><i></i></li>
        </ul>
    </dd>


    <dd><div class="title"><span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico03.png" /></span>出生时数据</div>
        <ul class="menuson">
            <li id="linkChildBorn" value="出生数据"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/childBornView.php?medicalID=','linkChildBorn')">出生数据</a><i></i></li>
        </ul>
    </dd>


    <dd><div class="title"><span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico04.png"  /></span>新生婴儿访视数据</div>
        <ul class="menuson">
            <li id="linkChildVisit" value="访视记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/addBabyVisitRecord.php?medicalID=','linkChildVisit')">访视记录</a><i></i></li>
        </ul>

    </dd>

    <dd><div class="title"><span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico01.png"  /></span>0-3岁数据</div>
        <ul class="menuson">
            <li id="linkThreeCheck" value="0-3岁体检记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/addUnderThreeCheckRecord.php?medicalID=','linkThreeCheck')">体检记录</a><i></i></li>
        </ul>

    </dd>

    <dd><div class="title"><span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico02.png"  /></span>学龄前数据</div>
        <ul class="menuson">
            <li id="linkSchoolBeforeCheck" value="学龄前体检记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/addSchoolBeforeCheckRecord.php?medicalID=','linkSchoolBeforeCheck')">体检记录</a><i></i></li>
        </ul>

    </dd>

    <dd><div class="title"><span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico03.png"  /></span>学龄期数据</div>
        <ul class="menuson">
            <li id="linkSchoolCheck" value="学龄期体检记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/addSchoolCheckRecord.php?medicalID=','linkSchoolCheck')">体检记录</a><i></i></li>
        </ul>

    </dd>

    <dd><div class="title"><span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico04.png"  /></span>青春期数据</div>
        <ul class="menuson">
            <li id="linkAdolesCheck" value="青春期体检记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/addAdolesCheckRecord.php?medicalID=','linkAdolesCheck')">体检记录</a><i></i></li>
        </ul>

    </dd>

    <dd><div class="title"><span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico02.png"  /></span>患病记录</div>
        <ul class="menuson">
            <li id="linkSickRecord" value="患病记录"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/addSickRecord.php?medicalID=','linkSickRecord')">患病记录</a><i></i></li>
        </ul>

    </dd>

    <dd><div class="title"><span><img src="/thinkphp/Public/others/teenagerGrow/images/leftico02.png"  /></span>相关图片</div>
        <ul class="menuson">
            <li id="linkUpImage" value="相关图片"><cite></cite><a href="javascript:void(0);" onclick="redirectTolinkChild('../view/addPhoto.php?medicalID=','linkUpImage')">相关图片</a><i></i></li>
        </ul>

    </dd>

</dl>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
<script>
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
    //将查看的就诊号传递给右侧显示页面
    function redirectTolinkChild(url,id){
        var medicalID=getParentUrlparm("medicalID");//拿到就诊号
        var liId=document.getElementById(id);
        var text=liId.getAttribute("value");
        $.post(
                url,
            {"medicalID":medicalID},
             function(data){
                $(".div1 .div3 .right1").html(text);
//                $(".div1 .div3 .right2 .bottom2").html(data);

            }
        )
        //隐藏左侧体检记录的日期下拉框
        $(".div1 .div3 .right2 .bottom1").css("visibility","hidden");
    };


    //左侧菜单页筛选右侧显示的对应页面
    function jumpToRight(para,id){
        var liId=document.getElementById(id);
        var $text=liId.getAttribute("value");
        $.ajax({
            url:para,
            success:function(data){
                $(".div1 .div3 .right1").html($text);
                $(".div1 .div3 .right2 .bottom2").html(data);

            }
        })
        //隐藏左侧体检记录的日期下拉框
        $(".div1 .div3 .right2 .bottom1").css("visibility","hidden");
    }

</script>