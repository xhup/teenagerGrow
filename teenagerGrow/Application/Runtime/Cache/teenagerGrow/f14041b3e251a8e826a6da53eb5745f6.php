<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>家族病史详情</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
</head>
<body>

<form id="childFamilySickForm" action="modifyMemberSickRecord" method="post">
    <table align="center" border="1" width="100%" cellspacing="5" cellpadding="5">
        <tr>
            <td>成员姓名：<input name="memberName" id="showMemberName" readonly="readonly" style="background-color: #9d9d9d"></td>
            <td>性别：<select size="1" name="memberSex" id="showMemberSex"><option></option><option value="男">男</option><option value="女">女</option></select></td>
            <td>与儿童关系：<input name="memberLink" id="showMemberLink"></td>
        </tr>
        <tr>
            <td>病例名称：<input name="sickName" id="showMemberSickName"></td>
            <td>发病年龄：<input name="sickAge" id="showMemberSickAge" placeholder="填入整数">岁</td>
            <td>是否治愈：<select size="1" name="isCure" id="showIsCure"><option></option><option value="是">是</option><option value="否">否</option></select>
        </tr>
        <tr>
            <td align="center">其他情况:</td>
            <td colspan="2"><textarea  name="others" id="showMemberOthers" rows="5" cols="100"></textarea></td>
        </tr>
        <tr>
            <td align="center" colspan="2">  <input type="submit" value="修改" class="btn btn-info"> </td>
            <td align="center" colspan="1">   <input type="button" value="删除" class="btn btn-info" id="memberDeleteBtn"></td>
        </tr>
    </table>
</form>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script>
    /*Ajax获取登录用户信息并显示*/
    $(function(){
        var url="showFamilySickRecord";
        $.post(url,function(data){
            document.getElementById('showMemberName').value =data.membername;
            document.getElementById('showMemberSex').value =data.membersex;
            document.getElementById('showMemberSickName').value =data.sickname;
            document.getElementById('showMemberSickAge').value =data.sickage;
            document.getElementById('showMemberLink').value =data.memberlink;
            document.getElementById('showIsCure').value =data.cure;
            document.getElementById('showMemberOthers').value =data.others;
        })

    })
</script>
<!--删除-->
<script>
    $(function(){
        $("#memberDeleteBtn").on("click",function(){
            var url="deleteMemberSick";
            $.get(url,function(data){
                if(data.icon==1){
                    alert("删除成功")
                    window.location.reload();
                }else {
                    alert("删除失败，请重试");
                    window.location.reload();
                }
            })
        })


    })

</script>

</body>
</html>