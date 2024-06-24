<?php
    if (!isset($wasRequireConn)){
        require 'conn.php';
    }

    function insertReply($newsid,$uid,$replyword){
        $tableName = "reply";
        $colname = "`newsid`, `uid`, `replymain`";
        $values = "'$newsid', '$uid', '$replyword'";

        $rs = insertSQL($tableName, $colname, $values);

        return $rs;
    }

    function getReplyByNewsid($newsid){
        $tableName = "reply";
        $colname = "replyid,reply.uid,uname,uimg,replymain";
        $ruleJoin = "LEFT JOIN user on reply.uid = user.uid ";
        $ruleWhere = "WHERE newsid = $newsid ";
        $ruleOrder = "ORDER BY replyid DESC ; ";
        $rule = $ruleJoin.$ruleWhere.$ruleOrder;

        $rs = selectSQL($tableName, $colname, $rule);

        return $rs;
    }