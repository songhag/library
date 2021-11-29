<?php
require_once "../model/user.php";
require_once "../model/user_application.php";
require_once "../model/class.php";
require_once "../model/grade.php";
if (isset($_POST["username"])&&isset($_POST["password"])){
    log_in($_POST["username"],$_POST["password"]);
}
function log_in($username,$password)
{
    $account=select_user_by_name_password($username,$password);
    if ($account[0]==1)
    {
        if ($account[1]->num_rows==1){
            $row = $account[1]->fetch_array();
            session_start();
            $_SESSION["user_id"]=$row["id"];
            $_SESSION["name"]=$row["name"];
            $_SESSION["user_name"]=$row["user_name"];
            $_SESSION["type"]=$row["type"];
            echo "<script>
            var url_last = 'http://'+window.location.host+'/library/view/home_panel.php';
            window.location.href = url_last;
</script>";
        }
        else{
            session_start();
            $_SESSION["log_in_error"]="密码或账号错误";
            echo "<script>
            var url_last = 'http://'+window.location.host+'/library/view/log_in.php';
            window.location.href = url_last;
</script>";
        }
    }
    else{
        echo "<script>
            var url_last = 'http://'+window.location.host+'/library/view/404.php';
            window.location.href = url_last;
</script>";
    }
}
