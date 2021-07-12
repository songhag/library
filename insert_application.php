<?php
include "model/user_application.php";
require_once "config.php";
date_default_timezone_set('Asia/ShangHai');
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
echo $a.$b.$c.$d.$e.$f.$g.$h.$i.$j.$k.$l.$m;
insert_into_user_application($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m);
?>