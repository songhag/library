<?php
require_once "../model/user.php";
require_once "../model/user_application.php";
require_once "../model/class.php";
require_once "../model/grade.php";
require_once "../model/borrow_book.php";
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
            $abc=check_normal($row["id"]);
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
function check_normal($user_id)//逻辑问题
{
    $a=select_borrow_book_by_user_id($user_id);
    $c=0;
    if ($a[0]==1)
    {
        for ($i=0;$i<$a[1]->num_rows;$i++)
        {
            $b=$a[1]->fetch_array();
            $d=$b["deadline"];
            $e=date("Y-m-d H:i:s",getdate()[0]);
            $f=strtotime($e)-strtotime($d);
            if ($b["state"]==-1)
            {
                $c=1;
                return 0;
            }
            if ($f<0)
            {
                update_user_by_id("state",-1,$user_id);
                return 0;
            }
        }
    }
    if ($c==0)
    {
        update_user_by_id("state",1,$user_id);
    }
    return 1;
}