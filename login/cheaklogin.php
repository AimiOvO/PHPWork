<?php
session_start();

if (!isset($_SESSION['logininfo'])) {
    $arr = array();
    $arr['islogin'] = false;
    $arr['isAdmin'] = false;
    $arr['uid'] = null;
    $arr['uimg'] = 'img/uimg/uimg2.jpg';
    $arr['name'] = '游客请登录';
    $arr['utype'] = 'guest';
    $_SESSION['logininfo'] = $arr;
}
$logininfo = $_SESSION['logininfo'];
header('Content-Type:text/html;charset=utf-8');