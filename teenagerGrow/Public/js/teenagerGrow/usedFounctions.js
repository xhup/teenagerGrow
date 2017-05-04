/**
 * Created by XH on 2016/3/21.
 */

/*获取页面url的指定参数值*/
function getUrlparm(parm){
    var reg = new RegExp("(^|&)" + parm + "=([^&]*)(&|$)","i");
    var value = window.location.search.substr(1).match(reg);
    if (value!=null){
        return (value[2]);
    } else {
        return null;
    }
}
/*获取页面父亲url的指定参数值(用于ifream中)*/
function getParentUrlparm(parm){
    var reg = new RegExp("(^|&)" + parm + "=([^&]*)(&|$)","i");
    var value = window.parent.location.search.substr(1).match(reg);
    if (value!=null){
        return (value[2]);
    } else {
        return null;
    }
}


//控制查询按钮在input输入框输入后才能点

    function butAble(id1,id2) {

        //var txtVal = $(this).val().length;
        if($(id1).val().trim().length){
            $(id2).removeAttr("disabled");
            $(id2).attr("class","btn-danger")
        }else{
            $("#getMedicalIDBut").prop("disabled","disabled");
        }


    }

//头部导航条的选择效果
$(".linkTop ul li").click(function(){
    $(".linkTop ul li.active").removeClass("active")
    $(this).addClass("active");
})





//儿童各种信息查看页面表格下面的取消功能
function cancel() {
    window.location.reload();
}

//将体检记录提交到后台进行修改,formID:要更改的体检表的ID，url:提交到的后台处理页面
function modifyRecord(formID,url){
    var form=document.getElementById(formID);
    form.action=url;
}
//将体检记录提交到后台进行删除
function deleteRecord(formID,dataID,dateBaseForm){
    var checkDate=document.getElementById(dataID).value ;//拿到体检日期
    var form=document.getElementById(formID);
    var url="deleteCheckRecord";
    //弹框确认是否真的要删除体检记录
    var answer=confirm('确定要删除？');
    if(answer==true){
        //$.post(url,{"checkDate":checkDate,"dataBaseForm":dateBaseForm,"tag":tag});
        form.action='deleteCheckRecord?checkDate='+checkDate+"&&dataBaseForm="+dateBaseForm;
    }else {
        return false;
    }
}
//验证输入不能为空（包括空格符）
function checkIsNotNull(parm){
   if(parm.replace(/(^\s*)|(\s*$)/g,"")==""){
       alert("请确保输入信息不为空");
       return false;
   } else {
       return parm;
   }

}
/*验证 */
function keepOnePoint(parm){
    var pattern=/^[0-9]+\.[0-9]$/;
    if(!pattern.test(parm)){
        alert("请确保输入身高体重保留一位小数");
        return false;
    }else {
        return parm;
    }

}




