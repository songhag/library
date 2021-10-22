<?php
session_start();
if (!isset($_SESSION["user_id"])||!isset($_SESSION["name"]))
{
    echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/log_in.php';
    window.location.href = url_last;
</script>";
}
else{
    if ($_SESSION["type"]!=1)
    {
        echo "<script>
    alert('你不是管理员');
    var url_last = 'http://'+window.location.host+'/library/view/home_panel.php';
    window.location.href = url_last;
</script>";
    }
    else
    {
        if (!isset($_GET["id"]))
        {
            echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/user_audit_list.php';
    window.location.href = url_last;
</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/audit_user/audit_user.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="head">
    <div id="head2">
        <div id="left">
            图书管理系统
        </div>
        <div id="right">
            <a href="#">嗨，许丹阳</a>
        </div>
    </div>
</div>
<div id="main_box">
    <a href="user_audit_list.php" id="home"><b><</b> 首页</a>
    <div style="clear: both"></div>
    <div id="select_type">
        <label id="audit_title">
            账户审核
        </label>
    </div>
    <div style="clear: both"></div>
    <?php
    require_once "../Controller/audit_controller.php";
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        echo get_app_info($id);
    }

    ?>
<!--    <div id="user_info">-->
<!--        <div id="user_info2">-->
<!--            <div class="list_1">-->
<!--                <span class="info_title">真实姓名</span>-->
<!--                <span class="info_content">许丹阳</span>-->
<!--            </div>-->
<!--            <div class="list_2">-->
<!--                <span class="info_title">用户名</span>-->
<!--                <span class="info_content">dannythesquare</span>-->
<!--            </div>-->
<!--            <div class="list_3">-->
<!--                <span class="info_title">注册日期</span>-->
<!--                <span class="info_content">2021/07/01</span>-->
<!--            </div>-->
<!--            <div class="list_4">-->
<!--                <span class="info_title">状态</span>-->
<!--                <span class="info_content">待审核</span>-->
<!--            </div>-->
<!--            <div class="list_1">-->
<!--                <span class="info_title">学生卡号</span>-->
<!--                <span class="info_content">0108706</span>-->
<!--            </div>-->
<!--            <div class="list_2">-->
<!--                <span class="info_title">电话号码</span>-->
<!--                <span class="info_content">18676599127</span>-->
<!--            </div>-->
<!--            <div class="list_3">-->
<!--                <span class="info_title">年龄</span>-->
<!--                <span class="info_content">9</span>-->
<!--            </div>-->
<!--            <div class="list_4">-->
<!--                <span class="info_title">性别</span>-->
<!--                <span class="info_content">其他</span>-->
<!--            </div>-->
<!--            <div class="list_5">-->
<!--                <span class="info_title">年级</span>-->
<!--                <span class="info_content">八年级</span>-->
<!--            </div>-->
<!--            <div class="list_5">-->
<!--                <span class="info_title">班级</span>-->
<!--                <span class="info_content">8-8</span>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div id="user_info3">-->
<!--            <form class="button" id="button_green">-->
<!--                <input type="text" name="user_id" value="12" hidden="hidden">-->
<!--                <input type="text" name="state" value="1" hidden="hidden">-->
<!--                <input type="submit" value="审核通过" class="button1">-->
<!--                <span>></span>-->
<!--            </form>-->
<!--            <form class="button" id="button_red">-->
<!--                <input type="text" name="user_id" value="12" hidden="hidden">-->
<!--                <input type="text" name="state" value="2" hidden="hidden">-->
<!--                <input type="submit" value="审核不通过" class="button1">-->
<!--                <span>></span>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->

</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/audit_user/audit_user.js"></script>
</html>