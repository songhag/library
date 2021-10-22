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
else{
    if ($_SESSION["type"]!=1)
    {
        echo "<script>
    alert('你不是管理员');
    var url_last = 'http://'+window.location.host+'/library/view/home_panel.php';
    window.location.href = url_last;
</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/borrow_book/borrow_book.css" type="text/css" rel="stylesheet">
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
    <div id="main_box2">
        <a href="home_panel.php" class="home"><b><</b> 首页</a>
        <div style="clear: both"></div>
        <div class="title2">
            借书登录
        </div>
        <form id="form" action="../Controller/book_controller.php" method="post">
            <div class="input_box2">
                <div class="input_box">
                    <span>用户名</span>
                    <input id="name" type="text" value="" name="username" placeholder="用户名" class="text" oninput="input_bc(this)" data="1">
                </div>
            </div>
            <div class="input_box2">
                <div class="input_box">
                    <span>密码</span>
                    <input id="password" type="text" value="" name="password" placeholder="密码" class="text" oninput="input_bc(this)" data="2">
                </div>
            </div>
            <div class="input_box2">
                <div id="submit1">
                    <span>></span>
                    <input type="submit" value="登录" id="submit">
                </div>
            </div>
        </form>
    </div>
</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/borrow_book/borrow_book.js"></script>
</html>