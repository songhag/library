<?php
require_once "../config.php";
function insert_into_user_application($user_name,$name,$age,$id_card,$gender,$create_time,$password,$update_time,$state,$auditor,$phone_number,$class,$grade){
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("insert into user_application(user_name,name,age,id_card,gender,create_time,password,update_time,state,auditor,phone_number,class,grade) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssisisssiisii", $a, $b, $c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m);
        $a = $user_name;
        $b = $name;
        $c = $age;
        $d = $id_card;
        $e = $gender;
        $f = $create_time;
        $g = $password;
        $h = $update_time;
        $i = $state;
        $j = $auditor;
        $k = $phone_number;
        $l = $class;
        $m =$grade;
        $stmt->execute();
        if ($GLOBALS["conn"]->affected_rows) {
            return "输入成功";
        } else {
            return "失败";
        }
    }
}
function select_user_application_by_paramiter($para,$id){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $stmt= $GLOBALS["conn"]->prepare("SELECT * from user_application where $para=?");
        $x="i";
        if($para=="id_card")
        {
            $x="s";
        }
        $stmt->bind_param("$x", $i);
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
        $y="s";
        if ($info_key=="age"||$info_key=="gender"||$info_key=="state"||$info_key=="auditor"||$info_key=="class"||$info_key=="grade")
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
