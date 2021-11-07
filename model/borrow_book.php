<?php
require_once "../config.php";
function insert_into_borrow_book($book_info_id,$user_id,$start_time,$deadline,$state,$add_time)
{
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("insert into borrow_book(book_info_id,user_id,start_time,deadline,state,add_time) values (?,?,?,?,?,?)");
        $stmt->bind_param("iissis", $a, $b, $c, $d, $e, $f);
        $a = $book_info_id;
        $b = $user_id;
        $c = $start_time;
        $d = $deadline;
        $e = $state;
        $f = $add_time;
        $stmt->execute();
        error_log($stmt->error);
        if ($stmt->affected_rows) {
            return [1,"输入成功"];
        } else {
            return [0,"失败"];
        }
    }
}
function select_borrow_book_by_id($id){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from borrow_book where id=?");
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
function update_borrow_book_by_id($info_key,$new_info,$id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("update borrow_book set $info_key=? where id=?");
        $y="s";
        if ($info_key=="book_info_id"||$info_key=="user_id"||$info_key=="state")
        {
            $y="i";
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