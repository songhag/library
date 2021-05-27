<?php
require_once "../config.php";
function insert_into_user($name,$type,$age,$id_card,$gender,$create_time,$password,$update_time,$state,$auditor,$phone_number,$user_name,$class,$grade)
{
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("insert into user(name,type,age,id_card,gender,create_time,password,update_time,state,auditor,phone_number,user_name,class,grade) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("iisisssiissii",$na,$ty,$ag,$id_ca,$ge,$cr,$pa,$up,$st,$au,$ph,$us,$cl);
        $na=$name;
        $ty=$type;
        $ag=$age;
        $id_ca=$id_card;
        $ge=$gender;
        $cr=$create_time;
        $pa=$password;
        $up=$update_time;
        $st=$state;
        $au=$auditor;
        $ph=$phone_number;
        $us=$user_name;
        $cl=$class;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows) {
            echo "输入成功";
        } else {
            echo "失败";
        }
    }
}
function select_user($id){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from user where id=?");
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
function update_user_by_id($info_key,$new_info,$id)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("update user set $info_key=? where id=?");
        $y="i";
        if ($info_key=="password"||$info_key=="phone_number"||$info_key=="user_name"||$info_key=="user_name"||$info_key=="update_time")
        {
            $y="s";
        }
        $stmt->bind_param($y."i", $key,$i);
        $key=$new_info;
        $i=$id;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows){
            echo "更新成功";
        } else {
            echo "失败";
        }
    }
}