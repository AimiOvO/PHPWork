<?php
require '../login/cheaklogin.php';
switch ($logininfo['islogin']) {
    case true:
        if ($_POST['title'] == "" || $_POST['newsmain'] == ""){
            echo '  <script>
                        alert("标题和内容不为能空！")
                        javascript :history.back(-1);
                    </script>';
            exit;
        }
        require '../public/newsDBC.php';
        switch ($_FILES["file"]["size"]==0){
            case true:
                $newsimg = 'img/newsimg/noimg';
            break;
            case false:
                $allowedExts = array("jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["file"]["name"]);
                echo $_FILES["file"]["size"];
                $extension = end($temp);
                if ((($_FILES["file"]["type"] == "image/jpeg")
                        || ($_FILES["file"]["type"] == "image/jpg")
                        || ($_FILES["file"]["type"] == "image/pjpeg")
                        || ($_FILES["file"]["type"] == "image/x-png")
                        || ($_FILES["file"]["type"] == "image/png"))
                    && ($_FILES["file"]["size"] < 20*1024*1024)
                    && in_array($extension, $allowedExts)) 
                {
                    if ($_FILES["file"]["error"] > 0) {
                        $err = $_FILES["file"]["error"];
                        echo "  <script>
                                    alert($err)
                                    javascript :history.back(-1);
                                </script>";
                        exit;
                    } else {
                        $newfilename = date("Y_m_d_H_i_s") . '.' . pathinfo($_FILES["file"]["name"])['extension'];
                        move_uploaded_file($_FILES["file"]["tmp_name"], "../img/newsimg/" . $newfilename);
                        $newsimg = 'img/newsimg/' . $newfilename;
                    }
                } else {
                    echo '  <script>
                                alert("非法的文件格式！")
                                javascript :history.back(-1);
                            </script>';
                    exit;
                }
            break;
        }

        $uname = $logininfo['name'];
        $newstitle = $_POST['title'];
        $newsmain = $_POST['newsmain'];
        $rs = insertnews($uname, $newstitle, $newsmain, $newsimg);
        
        if ($rs === true) {
            echo '  <script>
                        alert("发表成功")
                        window.location.href = "../userindex.php"
                    </script>';
        }else{
            echo '  <script>
                        alert("发表失败")
                        javascript :history.back(-1);
                    </script>';
            exit;
        }
        break;
    case false:
        echo '  <script>
                    alert("请登录！！")
                    window.location.href = "../login/userlogin.php"
                </script>';
         exit;
}
