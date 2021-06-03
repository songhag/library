<?php
require_once "model/class.php";
require_once "model/grade.php";
$get_information_of_class=select_class_by_id(6);
$row = $get_information_of_class->fetch_assoc();
$row_grade=select_grade_by_id($row["grade"])->fetch_assoc();
echo "这个信息是：".$row["name"]." ".$row["year"]." ".$row["state"]." ".$row_grade["name"];