<?php
session_start();
if (isset($_SESSION["user_name_2"])&&isset($_SESSION["name_2"])){
    unset($_SESSION["user_name_2"]);
    unset($_SESSION["name_2"]);
}
if (!isset($_SESSION["user_id"])||!isset($_SESSION["name"]))
{
    echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/log_in.php';
    window.location.href = url_last;
</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/home_panel/home_panel.css" type="text/css" rel="stylesheet">
</head>
<body>
<div id="head">
    <div id="head2">
        <div id="left">
    图书管理系统
        </div>
        <div id="right">
            <a href="#">注册</a>
            <a href="#">登录</a>
        </div>
    </div>
</div>
<div id="main_box">
    <div id="title2">
        图书管理系统
    </div>
    <div id="panel">
        <div class="same_panel">
            <?php
            if ($_SESSION["type"]==1)
            {
                echo '
                <a class="same_a" href="borrow_book.php">借书<b>></b></a>
                <a class="same_a" href="#">还书<b>></b></a>
            ';
            }
            else{
                echo '
                <a class="same_a" href="#">查看借书<b>></b></a>
            ';
            }
            ?>
            <a class="same_a" href="#">延期<b>></b></a>
            <a class="same_a" href="#">挂失<b>></b></a>
            <a class="same_a" id="last_block" href="home.php">登出<b>></b></a>
        </div>
        <?php
        if ($_SESSION["type"]==1)
        {
            echo '
            <div class="same_panel" id="bottom_box">
            <a class="same_a bottom_a" href="record_book.php">录入书<b>></b></a>
            <a class="same_a bottom_a" href="user_audit_list.php">审核<b>></b></a>
            </div>
            ';
        }
        ?>
    </div>
</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/home_panel/home_panel.js"></script>
</html>