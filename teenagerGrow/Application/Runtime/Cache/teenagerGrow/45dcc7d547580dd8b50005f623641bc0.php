<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>身高体重图表</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
</head>
<body>
<div class="linkTop">
    <ul class="nav nav-pills bg-info">
        <li class="active"><a href="#" onclick="jumpToBelow('queryHeightAndWeight.php')">身高曲线图</a></li>
        <li><a href="#" onclick="jumpToBelow('importHeightAndWeight.php')">体重曲线图</a></li>
    </ul>
</div>






<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/echarts.common.min.js"></script>

</body>
</html>