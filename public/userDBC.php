<?php
    if (!isset($wasRequireConn)){
        require 'conn.php';
    }

    function insertuser($uname, $upassword){
        $tableName = "user";
        $colname = "`uname`, `upassword`";
        $values = "'$uname', '$upassword'";

        $rs = insertSQL($tableName, $colname, $values);

        return $rs;
    }

    function cheakUnameRepeat($uname){
        $tableName = "user";
        $colname = "`uname`";
        $ruleWhere = "WHERE uname = '$uname'";
        $rule = $ruleWhere;

        $rs = selectSQL($tableName, $colname, $rule,"IN",$uname);

        return $rs->fetch_array()[0][0];
    }

    function cheaklogin($uname,$upassword){
        $tableName = "user";
        $colname = "*";
        $ruleWhere = "where `uname` = '$uname' and `upassword` = '$upassword'";
        $rule = $ruleWhere;

        $rs = selectSQL($tableName, $colname, $rule);
        if($rs == null){
            return false;
        }

        return $rs->fetch_array();
    }