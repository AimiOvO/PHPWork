<?php
$getinfo = $_GET['info'];
switch ($getinfo) {
    case 'exit':
        session_start();
        unset($_SESSION['logininfo']);
        header("Location: ../index.php");
        break;
    case 'register':
        header("Location: ../login/userRegister.php");
        break;
    case 'login':
        header("Location: ../login/userlogin.php");
        break;
    case 'delete':
        $newsid = $_GET['newsid'];
        header("Location: ../user/newsdelete.php?newsid=$newsid");
        break;
    case 'publish':
        header("Location: ../user/publish-news.php");
        break;

    case 'undone':
        echo '  <script>
                    alert("功能开发中！")
                    javascript :history.back(-1);
                </script>';
        break;
        
    default:
        header("Location: ../index.php");
        break;
}
