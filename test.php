<?php
    require 'public/replyDBC.php';

    session_start();
    if (true) {
        echo '  <script>
                    alert("游客请登录后回复！")
                    window.location.href = "userlogin.php"
                </script>';
        exit();
    }


    $newsid = $_POST['newsid'];
    $replyword = $_POST['replyword'];
    

    
?>
<pre>
    <?php
        var_dump($_POST)
     ?>
</pre>

