<?php
    $page = 1;      //当前页数
    $limit = 10;    //每页条目数
    $offset = 0;    //数据库条目查询偏移量

    if (isset($uname)){
        $newcount = getNewsCountOFUname($uname)->fetch_array()[0];
    }else if (isset($seachword)){
        $newcount = getNewsCountOFtitle($seachword)->fetch_array()[0];
    }else{
        $newcount = getNewsCount()->fetch_array()[0];
    }
    
    $totlepage = ceil($newcount/$limit);

    if(isset($_GET['down'])) {
        if ($_GET['page'] == $totlepage){
            $page = $_GET['page'];
            $offset = $page * $limit - $limit;

        }elseif ($_GET['page'] < $totlepage){
            $page = $_GET['page'] + 1;
            $offset = $page * $limit - $limit;

        }
    }

    if(isset($_GET['up'])) {
        if ($_GET['page'] > 1){
            $page = $_GET['page'] - 1;
            $offset = $page * $limit - $limit;

        }
    }