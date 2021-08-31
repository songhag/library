<?php
require_once "../model/user_application.php";
require_once "../Bussiness/audit_bussiness.php";
function get_audit_list ($a=2)
{
    $b="";
    if ($a==2)
    {
        $b=select_user_application_by_paramiter(1,1);
    }
    else{
        $b=select_user_application_by_paramiter("state", $a);
    }
    $str=get_audit_list_str($b);
    echo $str;
}

if (isset($_POST["state"])){
    // echo "<option>".$_POST["gradeId"]."</option>";
    get_audit_list($_POST["state"]);
}
