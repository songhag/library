<?php
include "model/user_application.php";
require_once "config.php";
date_default_timezone_set('Asia/ShangHai');
$data=select_user_application_by_paramiter("id_card",$_GET['id_card']);
$flag = true;
print_r($data);
for ($i=0;$i<($data->num_rows);$i++)
{
    $row = $data->fetch_assoc();
    echo $row["state"];
    if($row["state"]!="-1")
    {
        $flag=false;
        break;
    }
}
if ($flag)
{
    $a=$_GET['user_name'];
    $b=$_GET['name'];
    $c=$_GET['age'];
    $d=$_GET['id_card'];
    $e=$_GET['gender'];
    $f= date("Y-m-d H:i:s",getdate()[0]);
    $g=$_GET['password'];
    $h= date("Y-m-d H:i:s",getdate()[0]);
    $i=$_GET['state'];
    $j=$_GET['auditor'];
    $k=$_GET['phone_number'];
    $l=$_GET['class'];
    $m=$_GET['grade'];
//    echo $a.$b.$c.$d.$e.$f.$g.$h.$i.$j.$k.$l.$m;
    $isSuccess = insert_into_user_application($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m);
    if ($isSuccess == "失败") {
        echo "shibai";
    }
    else{
        echo "chenggong";
    }
}
else{
    echo "已存在";
}
?>