<?php
include_once "model/user.php";
date_default_timezone_set('Asia/ShangHai');
$a=$_GET['name'];
$b=$_GET['type'];
$c=$_GET['age'];
$d=$_GET['id_card'];
$e=$_GET['gender'];
$f= date("Y-m-d H:i:s",getdate()[0]);
$g=$_GET['password'];
$h= date("Y-m-d H:i:s",getdate()[0]);
$i=$_GET['state'];
$j=$_GET['auditor'];
$n=$_GET['phone_number'];
$k=$_GET['user_name'];
$l=$_GET['class'];
$m=$_GET['grade'];
echo $a.$b.$c.$d.$e.$f.$g.$h.$i.$j.$k.$l.$m;
insert_into_user($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m);
?>