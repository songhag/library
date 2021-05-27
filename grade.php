<?php
require_once "config.php";
function insert_into_grade($grade)
{
    if ($GLOBALS["conn"] ->connect_error){
        die("连接失败：".$GLOBALS["conn"] ->connect_error);
    }
    else{
            $sql = "insert into grade(name) values ($grade)";
            $result = $GLOBALS["conn"] ->query($sql);
            if ($GLOBALS["conn"] ->affected_rows)
            {
                echo "输入成功";
            }
            else{
                echo "失败";
            }
    }
}
function select_grade_by_id($id){
    if ($GLOBALS["conn"]->connect_error){
        die("连接失败：".$GLOBALS["conn"]->connect_error);
    }
    else{
        $sql = "SELECT * from grade where id='$id'";
        $result=$GLOBALS["conn"]->query($sql);
        if (!$GLOBALS["conn"]->error)
        {
            return $result;
        }
        else{
            echo $GLOBALS["conn"]->error;
        }
    }
}