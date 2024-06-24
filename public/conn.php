<?php
    $wasRequireConn = true;

    function getDBConncet(){
        require 'config.php';
        $conn = new mysqli($Host, $UserName, $Password, $DBname,$Port);
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }
        $conn->query("SET NAMES utf8");

        return $conn;
    }

    function querySQL($sql){
        $conn = getDBConncet();     //数据库连接对象
        //echo $sql."=======";
        $rs = $conn->query($sql); 
        $conn->close();

        return $rs;
    }

    function selectSQL($table, $colname, $rule, $type="FROM",$Value = ""){
        $selectTable = $table;    //查询的表名
        $selectCol = $colname;   //查询的列名
        $selectRule = $rule;    //查询的规则
        $selectType = $type;    //查询的类型
        $InValue = $Value;      //IN查询的值

        $sql = "";
        switch ($selectType){
            case "IN":
                $sql = "SELECT '".$InValue."' IN (";
            case "FROM":
                $sql = $sql."SELECT ".$selectCol." FROM ".$selectTable." ".$selectRule;
                if ($selectType == "IN"){
                    $sql = $sql.")";
                }
                break;
        }
        
        $rs = querySQL($sql); 

        return $rs;
    }

    function insertSQL($table, $colname, $values){
        $insertTable = $table;        //查询的表名
        $insertCol = $colname;       //查询的列名
        $insertValues = $values;    //查询的规则
        
        $sql = "INSERT INTO ".$insertTable."(".$insertCol.") VALUES (".$insertValues.")";
        $rs = querySQL($sql);

        return $rs;
    }

    function deleteSQL($table, $rule){
        $deleteTable = $table;    //查询的表名
        $deleteRule = $rule;     //查询的规则

        $sql = "DELETE FROM ".$deleteTable ." ". $deleteRule;
        $rs = querySQL($sql); 

        return $rs;
    }
?>
    
    


