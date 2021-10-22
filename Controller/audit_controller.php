<?php
require_once "../model/user_application.php";
require_once "../Bussiness/audit_bussiness.php";
require_once "../model/class.php";
require_once "../model/user.php";
require_once "../model/grade.php";
if (isset($_POST["states"])&&isset($_POST["user_id"]))
{
    $a=$_POST["states"];
    $b=$_POST["user_id"];
    audit_user($a,$b);
}
function audit_user($state,$id)
{
    session_start();
    $a=update_user_application_by_id("state",$state,$id);
    $b=update_user_application_by_id("auditor",$_SESSION["user_id"],$id);
    if ($a[0]==1&&$state==1&&$b[0]==1)
    {
        $account=select_user_application_by_paramiter("id",$id);
        $row = $account->fetch_array();
        $na=$row["name"];
        $ty=$row["type"];
        $ag=$row["age"];
        $id_ca=$row["id_card"];
        $ge=$row["gender"];
        $cr=$row["create_time"];
        $pa=$row["password"];
        $up=$row["update_time"];
        $st=$row["state"];
        $au=$_SESSION["user_id"];
        $ph=$row["phone_number"];
        $us=$row["user_name"];
        $cl=$row["class"];
        $gr=$row["grade"];
        $ca=$row["card_num"];
        $b=insert_into_user($na,$ty,$ag,$id_ca,$ge,$cr,$pa,$up,$st,$au,$ph,$us,$cl,$gr,$ca);
        if ($b[0]==1)
        {
            echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/user_audit_list.php';
    window.location.href = url_last;
</script>";
        }
        else{
            echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/404.php';
    window.location.href = url_last;
</script>";
        }
    }
    elseif($a[0]==1&&$state==-1&&$b[0]==1)
    {
        echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/user_audit_list.php';
    window.location.href = url_last;
</script>";
    }
    else{
        echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/404.php';
    window.location.href = url_last;
</script>";
    }
}
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
function get_app_info($id){
    $account=select_user_application_by_paramiter("id",$id);
    $str="";
    if ($account->num_rows==1){
        $row = $account->fetch_array();
        $str='
            <div id="user_info">
                <div id="user_info2">
                    <div class="list_1">
                        <span class="info_title">真实姓名</span>
                        <span class="info_content">
        ';
        $str.=$row["name"];
        $str.='
            </span>
            </div>
            <div class="list_2">
            <span class="info_title">用户名</span>
            <span class="info_content">
        ';
        $str.=$row["user_name"];
        $str.='
        </span>
        </div>
        <div class="list_3">
        <span class="info_title">注册日期</span>
        <span class="info_content">
        ';
        $create_time=$row["create_time"];
        $create_time=explode(" ",$create_time);
        $str.="$create_time[0]";
        $str.='
        </span>
        </div>
        <div class="list_4">
        <span class="info_title">状态</span>
        <span class="info_content">
        ';
        $state=$row["state"];
        if ($state==0)
        {
            $state="待审核";
        }
        elseif ($state==1)
        {
            $state="审核通过";
        }
        else
        {
            $state="审核不通过";
        }
        $str.=$state;
        $str.='
        </span>
        </div>
        <div class="list_1">
        <span class="info_title">学生卡号</span>
        <span class="info_content">
        ';
        $str.=$row["card_num"];
        $str.='
        </span>
        </div>
        <div class="list_2">
        <span class="info_title">电话号码</span>
        <span class="info_content">
        ';
        $str.=$row["phone_number"];
        $str.='
        </span>
        </div>
        <div class="list_3">
        <span class="info_title">年龄</span>
        <span class="info_content">
        ';
        $str.=$row["age"];
        $str.='
        </span>
        </div>
        <div class="list_4">
        <span class="info_title">性别</span>
        <span class="info_content">
        ';
        $gender=$row["gender"];
        if ($gender==1)
        {
            $gender="男";
        }
        elseif ($gender==2)
        {
            $gender="女";
        }
        else{
            $gender="许丹阳";
        }
        $str.=$gender;
        $str.='
        </span>
        </div>
        <div class="list_5">
        <span class="info_title">年级</span>
        <span class="info_content">
        ';
        $a=$row["grade"];
        $account2=select_grade_by_id($a);
        $row2= $account2->fetch_array();
        $str.=$row2["name"];
        $str.='
        </span>
        </div>
        <div class="list_5">
        <span class="info_title">班级</span>
        <span class="info_content">
        ';
        $a=$row["class"];
        $account2=select_class_by_id($a);
        $row2= $account2->fetch_array();
        $str.=$row2["name"];
        if ($row["state"]==0)
        {
            $str.='
            </span>
            </div>
            </div>
            <div id="user_info3">
                <form class="button" id="button_green" action="../Controller/audit_controller.php" method="post">
                    <input type="text" name="user_id" value="';
                $str.=$row["id"];
                $str.='" hidden="hidden">
                    <input type="text" name="states" value="1" hidden="hidden">
                    <input type="submit" value="审核通过" class="button1">
                    <span>></span>
                </form>
                <form class="button" id="button_red" action="../Controller/audit_controller.php" method="post">
                    <input type="text" name="user_id" value="';
                $str.=$row["id"];
                $str.='" hidden="hidden">
                    <input type="text" name="states" value="-1" hidden="hidden">
                    <input type="submit" value="审核不通过" class="button1">
                    <span>></span>
                </form>
            </div>
        </div>
        ';
        }
        else{
            $str.='
            </span>
            </div>
            </div>
        </div>
        ';
        }
    }
    return $str;
}