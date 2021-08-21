<?php
require_once "../config.php";
function insert_into_class($name,$state,$year,$grade)
{
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("insert into class(name,year,state,grade) values (?,?,?,?)");
        $stmt->bind_param("siii", $na, $ye, $st, $gr);
        $na = $name;
        $ye = $state;
        $st = $year;
        $gr = $grade;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows) {
            echo "输入成功";
        } else {
            echo "失败";
        }
    }
}
function select_class_by_id($id){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from class where id=?");
        $stmt->bind_param("i", $i);
        $i=$id;
        $stmt->execute();
        if (!$GLOBALS["conn"]->error)
        {
            return $stmt->get_result();
        }
        else{
            echo $GLOBALS["conn"]->error;
        }
    }
}
function select_class_by_grade($grade)
{
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("SELECT * from class where grade=?");
        $stmt->bind_param("i",$i);
        $i=$grade;
        $stmt->execute();
        if (!$GLOBALS["conn"]->error) {
            return [1,$stmt->get_result()];
        } else {
            return [2,$GLOBALS["conn"]->error];
        }
    }
}

function update_class_by_id($info_key,$new_info,$id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("update class set $info_key=? where id=?");
        $y="i";
        if ($info_key=="name")
        {
            $y="s";
        }
        $stmt->bind_param($y."i", $key,$i);
        $key=$new_info;
        $i=$id;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows) {
            echo "更新成功";
        } else {
            echo "失败";
        }
    }
}