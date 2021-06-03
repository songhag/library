<?php
include "model/user.php";
require_once "config.php";
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
$k=$_GET['phone_number'];
error_log($f);
$l=$_GET['user_name'];
$m=$_GET['class'];
$n=$_GET['grade'];
echo $a.$b.$c.$d.$e.$f.$g.$h.$i.$j.$k.$l.$m.$n;
insert_into_user($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n);
?>