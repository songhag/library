<?php
require_once "model/user.php";
$n=$_GET['name'];
$s=$_GET['state'];
$y=$_GET['year'];
$g=$_GET['grade'];
echo $n.$s.$y.$g;
insert_into_user($n,$s,$y,$g);
?>