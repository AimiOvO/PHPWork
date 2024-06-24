<?php
require '../public/userDBC.php';
$uname = $_POST['uname'];
$upassword = $_POST['upassword'];
$rs = cheaklogin($uname,$upassword);

if ($rs == false) {
    echo '  <script>
                alert("账户密码错误！")
                window.location.href = "userlogin.php"
            </script>';
} else {
    session_start();
    $arr = array();
    $arr['islogin'] = true;
    $arr['isAdmin'] = ($rs['utype'] == 'admin');
    $arr['uid'] = $rs['uid'];
    $arr['uimg'] = $rs['uimg'];
    $arr['name'] = $rs['uname'];
    $arr['utype'] = $rs['utype'];
    $_SESSION['logininfo'] = $arr;
    header("Location: ../index.php");
}
