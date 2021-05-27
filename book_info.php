<?php
require_once "config.php";
function insert_into_book_info($state,$type,$name,$isbn,$create_time,$publish_time,$author,$updator)
{
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("insert into book_info(state,type,name,isbn,create_time,publish_time,author,updator) values (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("iisssssi", $st, $ty, $na, $is, $cr, $pu, $au, $up);
        $st=$state;
        $ty=$type;
        $na=$name;
        $is=$isbn;
        $cr=$create_time;
        $pu=$publish_time;
        $au=$author;
        $up=$updator;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows) {
            echo "输入成功";
        } else {
            echo "失败";
        }
    }
}
function select_book_info_by_id($id){
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
function update_book_info_by_id($info_key,$new_info,$id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("update class set $info_key=? where id=?");
        $y="s";
        if ($info_key=="state"||$info_key=="type"||$info_key=="updator")
        {
            $y="i";
        }
        $stmt->bind_param($y.$y."sssss".$y, $key,$i);
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