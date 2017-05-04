<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/thirdPlug/DataTables/css/jquery.dataTables.css">
    <title>孕期检查记录列表</title>
</head>
<body>
<table id="pregnancyRecordTable" class="detailTable" align="center" border="0" width="90%" cellspacing="0" cellpadding="0">
    <thead>
    <tr>
        <th>就诊号</th>
        <th>检查日期</th>
        <th>操作<th>
    </tr>
    </thead>
</table>
</div>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/thirdPlug/DataTables/js/jquery.dataTables.min.js"></script>
<script>
    //    通过dataTables插件从服务器请求对应表格中儿童数据信息，这里要注意返回的数据要包装成"data"名字，并且数据列数与html中列数严格匹配，不然无法显示，这个问题卡了我好久
    $(document).ready(function() {
        var dataSource="<?php echo U('LookChild/allPregnancyRecordList');?>";
        $('#pregnancyRecordTable').DataTable( {
            "ajax": dataSource,
            "lengthChange":false,
            "searching": false,
             language: {
                "sProcessing": "处理中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "defaultContent": "<button>查看</button>"
            } ],
            "columns": [
                { "data": "account" },
                { "data": "checkdate" },
                null//最后一类数据不需要从服务器获取，是自定义跳转按键
            ]
        } );

    } );
</script>
<script>
  $(function(){
  $("#pregnancyRecordTable tbody").on("click","button",function(){
      var value =  $(this).parents("tr").children("td:eq(1)").text();//获取对应的体检日期
      //将点击的体检记录的体检日期存到后台并加载相应的具体体检记录
      var target="saveCheckDate";
      $.post(target,{"checkDate":value},function(data){
          var url="pregnancyCheck.html";
          if(data){
              $(".div1 .div3 .right2 .bottom2").load(url);
          }

      });

   })
  })
</script>
</body>
</html>