<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
    <title>查看相关图片</title>
</head>
<body>

<div class="gallery">

</div>

<script>
    /*加载已经存好的儿童图片*/
    $(function(){
        var url="loadImage";
        $.post(url,function(data){
          var totalNumber=data.length;//图片的总数量
            for(var i=0;i<totalNumber;i++){
                var div=$("<div><a href='#' target='_blank'><img src='#' width='100%' height='100%'/></a>" +
                        "<div class='deleteImg'><img src='/thinkphp/Public/others/teenagerGrow/images/cha.jpg' width='100%' height='100%'/></div>" +
                        " </div>");
                var image=data[i].imageurl;
                $(".gallery").append(div);
                $(".gallery div a:eq("+i+")").attr("href",image)
                        .find("img").attr("src",image);
            }
       })

    })
    /*删除点击的图片*/
    $(document).ready(function(){
        //给动态生成的dom绑定事件要用on方法，这是一种委托手段，如果用click方法无效（click只能给页面本身就存在的dom绑定点击事件）
        $(document).on("click",".deleteImg img",function(){
            var $objectUrl=this.parentNode.previousElementSibling.getAttribute("href");//拿到图片的url
            var medicalID= $(".right").attr("medicalID"); //拿到就诊号
            var answer=confirm('确定要删除选中图片？');//弹框确认是否真的要删除图片
            if(answer==true){var tag=1;}
            else {tag=0;}
            //如果确定要删除图片，AJAX删除数据库里存储的地址和文件夹里对应的图片文件
            if(tag){
                $.ajax({
                    url:"deleteChildPhoto",
                    type:"post",
                    dataType:"json",
                    data:{"medicalID":medicalID,"imgUrl":$objectUrl},
                    success:function(data){
                        var $message=data.code;
                        if($message==1){
                            setTimeout(function(){alert('删除成功！');location.reload();},1000);
                        }else {
                            setTimeout(function(){alert('删除失败！请稍后再试');location.reload();},1000);
                        }
                    }
                })

            }

        })

    })
</script>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
</body>
</html>