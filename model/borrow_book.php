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
            return [1,$stmt->get_result()];
        }
        else{
            return [0,$GLOBALS["conn"]->error];
        }
    }
}
function select_borrow_book_and_book_info_by_user_id($user_id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("select a.id as ReturnId, deadline, start_time,name, a.book_info_id as bookId From borrow_book as a, book_info as b where a.book_info_id=b.id and a.user_id=? and a.state=0;");
        $stmt->bind_param("i", $i);
        $i=$user_id;
        $stmt->execute();
        error_log($stmt->error);
        if (!$GLOBALS["conn"]->error)
        {
            return [1,$stmt->get_result()];
        }
        else{
            return [0,$GLOBALS["conn"]->error];
        }
    }
}
function select_borrow_book_and_book_info_by_user_id_and_state($user_id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("select a.id as ReturnId, b.price, deadline, start_time,name, a.book_info_id as bookId From borrow_book as a, book_info as b where a.book_info_id=b.id and a.user_id=? and a.state=-1 and b.state=-1;");
        $stmt->bind_param("i", $i);
        $i=$user_id;
        $stmt->execute();
        error_log($stmt->error);
        if (!$GLOBALS["conn"]->error)
        {
            return [1,$stmt->get_result()];
        }
        else{
            return [0,$GLOBALS["conn"]->error];
        }
    }
}
function select_borrow_book_and_book_info_by_user_id_and_book_id($user_id,$book_id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("select a.id as ReturnId, deadline, start_time,name, a.book_info_id as bookId From borrow_book as a, book_info as b where a.book_info_id=b.id and a.user_id=? and a.state=0 and b.id=?;");
        $stmt->bind_param("ii", $i,$j);
        $i=$user_id;
        $j=$book_id;
        $stmt->execute();
        error_log($stmt->error);
        if (!$GLOBALS["conn"]->error)
        {
            return [1,$stmt->get_result()];
        }
        else{
            return [0,$GLOBALS["conn"]->error];
        }
    }
}
function select_borrow_book_and_book_info_by_user_id_and_is_delay($user_id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("select a.id as ReturnId, deadline, start_time,name, a.book_info_id as bookId From borrow_book as a, book_info as b where a.book_info_id=b.id and a.user_id=? and a.state=0 and a.is_delay=0;");
        $stmt->bind_param("i", $i);
        $i=$user_id;
        $stmt->execute();
        error_log($stmt->error);
        if (!$GLOBALS["conn"]->error)
        {
            return [1,$stmt->get_result()];
        }
        else{
            return [0,$GLOBALS["conn"]->error];
        }
    }
}
function select_borrow_book_by_book_info_id_state($book_info_id,$state){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from borrow_book where book_info_id=? and state =?");
        $stmt->bind_param("ii", $i,$j);
        $i=$book_info_id;
        $j=$state;
        $stmt->execute();
        if (!$GLOBALS["conn"]->error)
        {
            return [1,$stmt->get_result()];
        }
        else{
            return [0,$GLOBALS["conn"]->error];
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
        if ($info_key=="book_info_id"||$info_key=="user_id"||$info_key=="state"||$info_key=="is_delay")
        {
            $y="i";
        }
        if ($info_key=="gain")
        {
            $y="d";
        }
        $stmt->bind_param($y."i", $key,$i);
        $key=$new_info;
        $i=$id;
        $stmt->execute();
        error_log($stmt->error);
        if ($GLOBALS["conn"]->affected_rows) {
            return [1,"更新成功"];
        } else {
            return [0,"失败"];
        }
    }
}