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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/record_book/record_book.css" type="text/css" rel="stylesheet">
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js">
    </script>
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
    <a href="home_panel.php" id="home"><b><</b> 首页</a>
        <label id="audit_title">
            录入书
        </label>
        <div id="input_box2">
            <div class="list_1">
                <span class="info_title">真实姓名</span>
                <span class="info_content">许丹阳</span>
            </div>
            <div class="list_2">
                <span class="info_title">用户名</span>
                <span class="info_content">dannythesquare</span>
            </div>
            <div class="list_3">
                <span class="info_title">注册日期</span>
                <span class="info_content">2021/07/01</span>
            </div>
            <div class="list_4">
                <span class="info_title">状态</span>
                <span class="info_content">待审核</span>
            </div>
            <div id="submit1">
                <span>></span>
                <input type="submit" value="录入" id="submit">
            </div>
        </div>
</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/record_book/record_book.js"></script>
</html>