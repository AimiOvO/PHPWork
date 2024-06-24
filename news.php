<?php
require 'login/cheaklogin.php';
require 'public/newsDBC.php';
require 'public/replyDBC.php';

if(!isset($_GET['id'])){
    echo '  <script>
                alert("错误传参！")
                javascript :history.back(-1);
            </script>';
    exit;
}

$newsid = $_GET['id'];
$rs = getnewsbyID($newsid);
$rs = $rs->fetch_array();
$reply = getReplyByNewsid($newsid);

?>

<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/public.css" />
    <link rel="stylesheet" type="text/css" href="css/news.css" />
    <title><?= '新闻快车 | '.$rs['newstitle']; ?></title>
</head>

<body>
    <style>
        .header {
            background: url(img/bg/headerbg.jpg);
        }
    </style>
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
                <p>新闻详情</p>
            </div>
            <div class="main-news">
                <div class="news">
                    <div class="news-main">
                        <p class="title"><?= $rs['newstitle']; ?></p>
                        <p class="author">作者：<?= $rs['uname'] ?></p>
                        <div class="news-img">
                            <img src="<?= $rs['newsimg']; ?>" alt="">
                        </div>
                        <?php
                        $str = (explode("\n",$rs['newsmain']));
                        foreach ($str as $v){
                        ?>
                            <p class="newsword"><?= $v ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="replyborad">
                <?php
                    if (!$logininfo['islogin']) {
                ?>
                    <div class="replycontent">
                        <p>登录后可以回复主题哦~</p>
                    </div>
                <?php
                    }else{
                ?>
                    <div class="replycontent">
                        <form action="user/newsreply.php" method="post" class="replyword">
                            <input type="text" name="newsid" value="<?= $newsid ?>" style="display: none;">
                            <textarea type="text" name="replyword" ></textarea>
                            <input type="submit" value="发表回复">
                        </form>
                    </div>
                <?php
                    }
                ?>
            </div>

            <?php
            if($reply->num_rows != 0){
            ?>
            <div class="newsreply">
                <?php
                foreach ($reply as $key => $value){
                ?>
                <div class="reply">
                    <div class="r-userinfo">
                        <div class="r-uheader">
                            <img src="<?php
                                if ($value['uimg'] == null){
                                    echo "img/uimg/uimg2.jpg";
                                }else{
                                    echo $value['uimg'];
                                }
                            ?>" alt="">
                        </div>
                        <div class="r-uname">
                            <p><?php 
                                if ($value['uname'] == null){
                                    echo "该用户已注销";
                                }else{
                                    echo $value['uname'];
                                }
                             ?></p>
                        </div>
                    </div>

                    <div class="replymain">
                        <pre><?= $value['replymain'] ?></pre>
                    </div>
                </div>
                <?php
                }
                ?>
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