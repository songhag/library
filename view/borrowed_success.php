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
    else{
        if (!isset($_SESSION["user_name_2"])||!isset($_SESSION["name_2"]))
        {
            echo "<script>
    alert('你没登陆');
    var url_last = 'http://'+window.location.host+'/library/view/home_panel.php';
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
    <link href="../content/borrow_book_login/borrow_book_login.css" type="text/css" rel="stylesheet">
    <script src="../content/aaa_JQ/jquery-1.8.0.js"></script>
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
    <div id="main_box3">
        <a href="home_panel.php" class="home"><b><</b> 首页</a>
        <div id="info">
            <div class="name">
                <div class="box1">
                    <span>账号</span>
                    <?php
                    if (isset($_SESSION["user_name_2"]))
                    {
                        echo $_SESSION["user_name_2"];
                    }
                    ?>
                </div>
            </div>
            <div class="name">
                <div class="box1">
                    <span>学生</span>
                    <?php
                    if (isset($_SESSION["name_2"]))
                    {
                        echo $_SESSION["name_2"];
                    }
                    ?>
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
        <div class="title2">
            借书
        </div>
        <div id="box3">
            <form id="form2" method="post">
                <input id="id" type="text" value="" name="search_id" placeholder="书本编号">
                <input type="submit" value="→" id="submit2">
            </form>
        </div>
    </div>
</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/borrow_book_login/borrow_book_login.js"></script>
</html>