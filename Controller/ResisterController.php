<?php
require_once "../model/user_roll.php";
require_once "../Bussiness/resister_bussiness.php";
require_once "../model/grade.php";
require_once "../model/class.php";
require_once "../model/user_application.php";

if (isset($_POST["username"])&&isset($_POST["name"]))
{
    if(check_application()){
        echo insert_into_application();
    }
    else
    {
        echo"已注册";
    }
}

if (isset($_POST["gradeId"])){
    // echo "<option>".$_POST["gradeId"]."</option>";
    echo get_class_name_list($_POST["gradeId"]);
}

function insert_into_application(){
    $a=$_POST['username'];
    if (strlen($a)>20)
    {
        return "名字太长了";
    }
    $b=$_POST['name'];
    if (preg_match("/^[\x7f-\xffa-zA-Z]+$/",$b)!=1||strlen($b)>20)
    {
        return "名字只能是中英文";
    }
    $c=$_POST['age'];
    if (preg_match("/[0-9]+$/",$c)!=1)
    {
        return "年龄只能输数字";
    }
    $d=$_POST['idCard'];
    if (preg_match("/^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/",$d)!=1)
    {
        return "身份证不符合";
    }
    $e=$_POST['gender'];
    $f= date("Y-m-d H:i:s",getdate()[0]);
    $g=$_POST['password'];
    if (strlen($g)>20)
    {
        return "密码太长";
    }
    $h= date("Y-m-d H:i:s",getdate()[0]);
    $i=0;
    $j=0;//    $_POST["auditor"]
    $k=$_POST['phoneNumber'];
    if (preg_match("/^1[34578]\d{9}$/",$k)!=1)
    {
        return "手机号码有误";
    }
    $l=$_POST['class'];
    $m=$_POST['grade'];
    $n=$_POST['type'];
    $o=$_POST['card_num'];
    if (preg_match("/[0-9]+$/",$o)!=1||strlen($o)>20)
    {
        return "卡号只能输数字";
    }
    $isSuccess = insert_into_user_application($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o);
    if ($isSuccess == "失败") {
        return "注册失败";
    }
    else{
        session_start();
        $_SESSION["usernameApplication"] = $_POST['username'];
        return "注册成功";
    }
}
function check_application(){
    $data=select_user_application_by_paramiter("id_card",$_POST['idCard']);

    for ($i=0;$i<($data->num_rows);$i++)
    {
        $row = $data->fetch_assoc();
//        error_log($row["state"]);
//        error_log($row["id_card"]);
        //echo $row["state"];
        if($row["state"]!="-1")
        {
            return false;
        }
    }
    return true;
}
function get_type_list()
{
    $user_roll_data = select_user_roll();
    if ($user_roll_data[0]==1){
        $list_str = get_user_roll_list($user_roll_data[1]);
        return $list_str;
    }else{
        return $user_roll_data[1];
    }
}
function get_name_list()
{
    $grade_data = select_grade();
    if ($grade_data[0]==1)
    {
        $list_str = get_grade_list($grade_data[1]);
        return $list_str;
    }
    else{
        return $grade_data[1];
    }
}
function get_class_name_list($id=null)
{
    if (!$id)
    {
        $id=14;
    }
    $grade_data = select_class_by_grade($id);
    if ($grade_data[0]==1)
    {
        $list_str = get_class_list($grade_data[1]);
        return $list_str;
    }
    else{
        return $grade_data[1];
    }
}