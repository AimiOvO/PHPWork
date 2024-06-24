<?php
require '../login/cheaklogin.php';
if (!$logininfo['islogin']) {
    echo '  <script>
                alert("请登录！")
                window.location.href = "../login/userlogin.php"
            </script>';
    exit;
}
?>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/publish-news.css" />
    <title>新闻快车 | 新闻发布</title>
</head>

<body>
    <div class="publishCotrol">
        <div class="logo">
            <p>新闻发布</p>
        </div>
        <div class="publishplane">
            <form action="uploadnews.php" method="post" class="plane" enctype="multipart/form-data">
                <div class="newsedit">
                    <p>标题：</p><input type="text" name="title"><br>
                    <p>内容：</p><textarea type="text" name="newsmain"></textarea><br>
                    <p>图片：</p><input type="file" name="file"><br>
                    <input type="submit" value="发表">
                </div>
            </form>
        </div>
    </div>
</body>

</html>