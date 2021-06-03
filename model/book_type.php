<?php
require_once "config.php";
function insert_into_book_type($name)
{
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("insert into book_type(name) values (?)");
        $stmt->bind_param("s",$na);
        $na = $name;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows) {
            echo "输入成功";
        } else {
            echo "失败";
        }
    }
}
function select_book_type_by_id($id){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from book_type where id=?");
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
function update_book_type_by_id($info_key,$new_info,$id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("update book_type set $info_key=? where id=?");
        $stmt->bind_param("si", $key,$i);
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
