<?php
error_log("oiioioioioioioio");
$GLOBALS["servername"] = "localhost:3306";
$GLOBALS["username"] = "root";
$GLOBALS["password"] = "root";
$GLOBALS["dbname"] = "library_system";
$GLOBALS["conn"] = new mysqli($GLOBALS["servername"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["dbname"]);
?>