<?php
require_once "class(statement).php";
$n=$_GET['name'];
$s=$_GET['state'];
$y=$_GET['year'];
$g=$_GET['grade'];
echo $n.$s.$y.$g;
insert_into_class($n,$s,$y,$g);
?>