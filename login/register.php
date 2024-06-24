<?php
    require '../public/userDBC.php';

    $uname = $_POST['uname'];
    $upassword1 = $_POST['upassword1'];
    $upassword2 = $_POST['upassword2'];

    //判定名字和密码是否合法
    if (!cheakUname($uname) || !cheakPassword($upassword1, $upassword2)) {
        echo '  <script>
                    alert("账户名或密码非法！")
                    window.location.href = "userRegister.php"
                </script>';
        exit;
    }
    //判定名字是否存在
    if (cheakUnameRepeat($uname) == 1){
        echo '  <script>
                    alert("用户名已存在")
                    window.location.href = "userRegister.php"
                </script>';
        exit;
    }

    $rs = insertuser($uname, $upassword1);
    
    if ($rs === true) {
        echo '  <script>
                    alert("注册成功")
                    window.location.href = "userlogin.php"
                </script>';
    }else{
        echo '  <script>
                    alert("注册失败")
                    window.location.href = "userRegister.php"
                </script>';
        exit;
    }

    function cheakUname($uname){
        if(strlen($uname) == 0 || strlen($uname) > 10){
            return false;
        }
        //正则匹配字符串
        if(!preg_match("/^[a-z\d]*$/i",$uname))
        {
            return false;
        }

        return true;
    }

    function cheakPassword($upassword1, $upassword2){
        $p1 = $upassword1;
        $p2 = $upassword2;
        $plength = strlen($p1);
        if ($p1 != $p2){
            return false;
        }
        if ($plength < 8 || $plength > 16){
            return false;
        }
        //正则匹配字符串
        if(!preg_match("/^[a-z\d]*$/i",$p1))
        {
            return false;
        }

        return true;
    }