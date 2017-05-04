<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="UTF-8">
    <title>上传相关图片</title>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/bootstrap.min.css">
</head>
<body>

<div id="upLinkImage">
    <div class="upImage">
    <form enctype="multipart/form-data" method="post" action="imageUpload">
        <label>上传相关图片：</label>
        <input type="file" name="photo" class="upPhoto">
        <!--    <input type="file" name="photo[]" class="upPhoto">-->
        <input type="submit" name="upload" value="上传" class="btn-block">
    </form>
    </div>
</div>

<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/teenagerGrow/usedFounctions.js"></script>
</body>
</html>