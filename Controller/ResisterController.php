<?php
require_once "../model/user_roll.php";
require_once "../Bussiness/resister_bussiness.php";
require_once "../model/grade.php";
require_once "../model/class.php";
require_once "../model/user_application.php";

if (isset($_POST["username"])&&isset($_POST["name"]))
{
    if(check_application()){
        insert_into_application();
    }
}

if (isset($_POST["gradeId"])){
    // echo "<option>".$_POST["gradeId"]."</option>";
    echo get_class_name_list($_POST["gradeId"]);
}

function insert_into_application(){
    $a=$_POST['user_name'];
    $b=$_POST['name'];
    $c=$_POST['age'];
    $d=$_POST['id_card'];
    $e=$_POST['gender'];
    $f= date("Y-m-d H:i:s",getdate()[0]);
    $g=$_POST['password'];
    $h= date("Y-m-d H:i:s",getdate()[0]);
    $i=$_POST['state'];
    $j=$_POST['auditor'];
    $k=$_POST['phone_number'];
    $l=$_POST['class'];
    $m=$_POST['grade'];
    $isSuccess = insert_into_user_application($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m);
    if ($isSuccess == "失败") {
        echo "shibai";
    }
    else{
        echo "chenggong";
    }
}
function check_application(){
    date_default_timezone_set('Asia/ShangHai');
    $data=select_user_application_by_paramiter("id_card",$_POST['id_card']);
    $flag = true;
    //print_r($data);
    for ($i=0;$i<($data->num_rows);$i++)
    {
        $row = $data->fetch_assoc();
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