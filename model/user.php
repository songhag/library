<?php
require_once "../config.php";
function insert_into_user($name,$type,$age,$id_card,$gender,$create_time,$password,$update_time,$state,$auditor,$phone_number,$user_name,$class,$grade,$card_num)
{
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $sql="insert into user(name,type,age,id_card,gender,create_time,password,update_time,state,auditor,phone_number,user_name,class,grade,card_num) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $GLOBALS["conn"]->prepare($sql);
        $stmt->bind_param("siisisssiissiis",$na,$ty,$ag,$id_ca,$ge,$cr,$pa,$up,$st,$au,$ph,$us,$cl,$gr,$ca);
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
        $gr=$grade;
        $ca=$card_num;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows) {
            return [1,"输入成功"];
        } else {
            return [0,"失败"];
        }
    }
}
function select_user_by_id_password($id,$password)
{
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from user where id=? and password=?");
        $stmt->bind_param("is", $a,$b);
        $a=$id;
        $b=$password;
        $stmt->execute();
        if (!$GLOBALS["conn"]->error)
        {
            return [1,$stmt->get_result()];
        }
        else{
            return [2,$GLOBALS["conn"]->error];
        }
    }
}
function select_user_by_name_password($username,$password){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from user where user_name=? and password=?");
        $stmt->bind_param("ss", $a,$b);
        $a=$username;
        $b=$password;
        $stmt->execute();
        if (!$GLOBALS["conn"]->error)
        {
            return [1,$stmt->get_result()];
        }
        else{
            return [2,$GLOBALS["conn"]->error];
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
            return [1,$stmt->get_result()];
        }
        else{
            return [0,$GLOBALS["conn"]->error];
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
        if ($info_key=="password"||$info_key=="phone_number"||$info_key=="user_name"||$info_key=="user_name"||$info_key=="update_time"||$info_key=="card_num")
        {
            $y="s";
        }
        $stmt->bind_param($y."i", $key,$i);
        $key=$new_info;
        $i=$id;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows){
            return [1,"更新成功"];
        } else {
            echo [0,"失败"];
        }
    }
}