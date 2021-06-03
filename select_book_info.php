<?php
require_once "model/class.php";
require_once "model/book_type.php";
$get_information_of_class = select_class_by_id(1);
$row = $get_information_of_class->fetch_assoc();
$row_type = select_book_type_by_id($row["type"])->fetch_assoc();
$row_updator = select_user_by_id($row["updator"])->fetch_assoc();
echo "这个信息是："." ".$row["state"]." ".$row_updator["name"]." ".$row["name"]." ".$row["isbn"]." ".$row["create_time"]." ".$row["publish_time"]." ".$row["author"]." ".$row_updator["user_name"];