<?php
require_once "../config.php";
function select_user_roll()
{
    if ($GLOBALS["conn"]->connect_error) {
        die("连接失败：" . $GLOBALS["conn"]->connect_error);
    } else {
        $stmt = $GLOBALS["conn"]->prepare("SELECT * from user_roll");
        $stmt->execute();
        if (!$GLOBALS["conn"]->error) {
            return [1,$stmt->get_result()];
        } else {
            return [2,$GLOBALS["conn"]->error];
        }
    }
}
