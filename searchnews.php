<?php
require 'public/newsDBC.php';
require 'login/cheaklogin.php';

$seachword = $_GET['seachword'];

require 'public/pageLimit.php';
$rs = offsetSelectNewsByTitle($limit,$offset,$seachword);

?>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/public.css" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <title>新闻快车 | 新闻搜索</title>
</head>
<style>
    .header {
        background: url(img/bg/headerbg.jpg);
    }
</style>
<body>
    <!-- 头部 -->
    <div id="header" class="header">
        <div class="logo">
            <a href="index.php">
                <p>新闻快车</p>
            </a>
        </div>
        <div class="nav">
            <ul>
                <li style="display: none;"><a href="web/web.php?info=undone">趣闻</a></li>
                <li style="display: none;"><a href="web/web.php?info=undone">时事</a></li>
                <li><a href="index.php">首页</a></li>
                <form action="searchnews.php" method="get" class="seachBox">
                    <li>
                        <input type="text" placeholder="搜索新闻..." name="seachword">
                    </li>
                </form>
            </ul>
        </div>
    </div>
    <!-- 中间段 -->
    <div id="main" class="main">
        <div id="leftcol" class="leftcol">
            <div class="main-header">
                <p>搜索结果</p>
            </div>
            <div class="main-news">
                <?php
                foreach ($rs as $key => $value) { //循环遍历数组，再跟据数据库列名来打印出数据
                ?>
                    <a class="newslink" href="<?= 'news.php?id=' . $value['newsid']; ?>">
                        <div class="news">
                            <div class="news-img">
                                <img src="<?= $value['newsimg']; ?>" alt="">
                            </div>
                            <div class="news-main">
                                <p class="title"><?= $value['newstitle']; ?></p>
                                <p class="author">作者：<?= $value['uname'] ?></p>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>

            <?php
            if($totlepage > 1){
            ?>
            <div class="pageControl">
                <form method="get" class="limit">
                    <input type="text" value="<?= $page ?>" name="page" style="display: none;" />
                    <input type="submit" value="上一页" name="up" <?php  if($page == 1) {echo "disabled";}?> />
                    <p> <?= $page ?> / <?= $totlepage ?> <p>
                    <input type="submit" value="下一页" name="down" <?php if($page >= $totlepage) {echo "disabled";}?>/>
                </form>
            </div>
            <?php
            }
            ?>

        </div>

        <?php include 'public/rightcol.php'; ?>
    </div>

    <div id="footer" class="footer">
        <p>文字素材来源于网络</p>
        <p>图片素材来源于网络</p>
        <p></p>
    </div>
    
</body>

</html>