<?php
    require '../login/cheaklogin.php';
    require '../public/replyDBC.php';

    if (!$logininfo['islogin']) {
        echo '  <script>
                    alert("游客请登录后回复！")
                    window.location.href = "../login/userlogin.php"
                </script>';
        exit();
    }

    $newsid = $_POST['newsid'];
    $replyword = $_POST['replyword'];
    $uid = $logininfo['uid'];
    
    if (strlen($replyword) == 0){
        echo '  <script>
                    alert("内容为空！")
                    javascript :history.back(-1);
                </script>';
        exit();
    }elseif (strlen($replyword) > 255){
        echo '  <script>
                    alert("回复不能超过255字！")
                    javascript :history.back(-1);
                </script>';
        exit();
    }

    $rs = insertReply($newsid,$uid,$replyword);
    
    if ($rs === true) {
        echo '  <script>
                    alert("发表成功")
                    window.location.href = "../news.php?id='.$newsid.'"
                </script>';
    }else{
        echo '  <script>
                    alert("发表失败")
                    javascript :history.back(-1);
                </script>';
        exit;
    }


    
?>
<pre>
    <?php
        var_dump($_POST);
        echo strlen($replyword);
     ?>
</pre>

