<?php
require_once "grade.php";
$n=$_GET['num'];
for ($i=1;$i<$n;$i++)
{
    insert_into_grade($i);
}
