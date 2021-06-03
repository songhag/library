<?php
require_once "config.php";
function insert_into_user_application($user_name,$name,$age,$id_card,$gender,$create_time,$password,$update_time,$state,$auditor,$phone_number,$class,$grade){
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("insert into user_application(user_name,name,age,id_card,gender,create_time,password,update_time,state,auditor,phone_number,class,grade) values (?,?,?)");
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
function select_user_application_by_id($id){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from user_application where id=?");
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
function update_user_application_by_id($info_key,$new_info,$id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("update user_application set $info_key=? where id=?");
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