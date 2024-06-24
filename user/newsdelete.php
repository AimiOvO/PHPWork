<?php
require '../login/cheaklogin.php';
switch ($logininfo['islogin']){
    case true:
        require '../public/newsDBC.php';
        if (true) {
            if ($logininfo['isAdmin']) {

            } else {
                $newsid = $_GET['newsid'];
                $uname = $logininfo['name'];
                $isAuthor = checkNewFromUser($newsid ,$uname);
                if ($isAuthor == 1) {
                } else {
                    echo '  <script>
                                alert("没有权限或页面不存在！")
                                javascript :history.back(-1);
                            </script>';
                    break;
                }
            }
            echo '  <script>
                        alert("删除成功")
                    </script>';
            $newsid = $_GET['newsid'];
            $rs = deleteNewsbyID($newsid);
            echo '  <script>
                        javascript :history.back(-1);
                    </script>';
        }
        break;
    case false:
        echo '  <script>
                    alert("请登录！！")
                    window.location.href = "../login/userlogin.php"
                </script>';
    
}
