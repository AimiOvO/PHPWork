<?php
    if (!isset($wasRequireConn)){
        require 'conn.php';
    }

    function checkNewFromUser($newsid ,$uname){
        $tableName = "news";
        $colname = "`newsid`";
        $ruleWhere = "WHERE uname = '$uname'";
        $rule = $ruleWhere;

        $rs = selectSQL($tableName, $colname, $rule,"IN",$newsid);

        return $rs->fetch_array()[0][0];
    }

    function deleteNewsbyID($newsid){
        $tableName = "news";
        $ruleWhere = "WHERE newsid='$newsid'";
        $rule = $ruleWhere;

        $rs = deleteSQL($tableName, $rule);

        return $rs;
    }

    function insertnews($uname, $newstitle, $newsmain, $newsimg){
        $tableName = "news";
        $colname = "`uname`, `newstitle`, `newsmain`, `newsimg`";
        $values = "'$uname', '$newstitle', '$newsmain','$newsimg'";

        $rs = insertSQL($tableName, $colname, $values);

        return $rs;
    }

    function getALLnewslist(){
        $tableName = "news";
        $colname = "`newsid`,`uname`,`newsimg`,`newstitle`";
        $ruleORDER = "ORDER BY `news`.`newsid`  DESC;";
        $rule = $ruleORDER;

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

    function getNewsCount(){
        $tableName = "news";
        $colname = "count(*)";
        $rule = "";

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

    function getNewsCountOFUname($uname){
        $tableName = "news";
        $colname = "count(*)";
        $rule = "WHERE uname = '$uname';";

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

    function getNewsCountOFtitle($newstitle){
        $tableName = "news";
        $colname = "count(*)";
        $rule = "where `newstitle` like '%$newstitle%' ";

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }


    function offsetSelectNews($limit,$offset){
        $tableName = "news";
        $colname = "`newsid`,`uname`,`newsimg`,`newstitle`";
        $ruleORDER = "ORDER BY `news`.`newsid`  DESC ";
        $ruleLimit = "LIMIT $limit OFFSET $offset;";
        $rule = $ruleORDER . $ruleLimit;

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

    function offsetSelectNewsByUname($limit,$offset,$uname){
        $tableName = "news";
        $colname = "`newsid`,`uname`,`newsimg`,`newstitle`";
        $ruleWhere = "where `uname` = '$uname' ";
        $ruleORDER = "ORDER BY `news`.`newsid`  DESC ";
        $ruleLimit = "LIMIT $limit OFFSET $offset;";
        $rule = $ruleWhere . $ruleORDER . $ruleLimit;

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

    function offsetSelectNewsByTitle($limit,$offset,$newstitle){
        $tableName = "news";
        $colname = "`newsid`,`uname`,`newsimg`,`newstitle`";
        $ruleWhere = "where `newstitle` like '%$newstitle%' ";
        $ruleORDER = "ORDER BY `news`.`newsid`  DESC ";
        $ruleLimit = "LIMIT $limit OFFSET $offset;";
        $rule = $ruleWhere . $ruleORDER . $ruleLimit;

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

    function getnewsbyTitle($newstitle){
        $tableName = "news";
        $colname = "`newsid`,`uname`,`newsimg`,`newstitle`";
        $ruleWhere = "where `newstitle` like '%$newstitle%' ";
        $ruleORDER = "ORDER BY `news`.`newsid` DESC;";
        $rule = $ruleWhere . $ruleORDER;

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

    function getnewslistbyUname($uname){
        $tableName = "news";
        $colname = "`newsid`,`uname`,`newsimg`,`newstitle`";
        $ruleWhere = "where `uname` = '$uname' ";
        $ruleORDER = "ORDER BY `news`.`newsid` DESC;";
        $rule = $ruleWhere . $ruleORDER;

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

    function getnewsbyID($newsid){
        $tableName = "news";
        $colname = "`uname`,`newsimg`,`newstitle`,`newsmain`";
        $ruleWhere = "where `newsid` = $newsid ";
        
        $rule = $ruleWhere;

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }

