<?php
require_once "grade.php";
$get_information_of_grade=select_grade_by_id(14);
$row = $get_information_of_grade->fetch_assoc();
print_r($row);