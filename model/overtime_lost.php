<?php
require_once "config.php";
function insert_into_overtime_lost($borrow_book_id,$state,$type){
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("insert into overtime_lost(borrow_book_id,state,type) values (?,?,?)");
        $stmt->bind_param("siii", $a, $b, $c);
        $a = $borrow_book_id;
        $b = $state;
        $c = $type;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows) {
            echo "输入成功";
        } else {
            echo "失败";
        }
    }
}
function select_overtime_lost_by_id($id){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from overtime_lost where id=?");
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
function update_overtime_lost_by_id($info_key,$new_info,$id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("update overtime_lost set $info_key=? where id=?");
        $stmt->bind_param("ii", $key,$i);
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