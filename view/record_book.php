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
    <form id="select_type" action="../Controller/book_controller.php" method="post">
        <label id="audit_title">
            录入书
        </label>
        <div id="input_box2">
            <div class="input_box">
                <span>ISBN</span>
                <input id="isbn" type="text" value="" name="isbn" placeholder="ISBN" class="text" oninput="input_bc(this)" data="2">
            </div>
            <div class="input_box">
                <span>书名</span>
                <input id="name" type="text" value="" name="name" placeholder="书名" class="text" oninput="input_bc(this)" data="3">
            </div>
            <div class="input_box">
                <span>作者</span>
                <input id="author" type="text" value="" name="author" placeholder="作者" class="text" oninput="input_bc(this)" data="4">
            </div>
            <div class="input_box">
                <span id="type_span">类别</span>
                <select id="type" name="type" class="text" onchange="select_bc(this)">
                    <option value="0">--请选择类别--</option>
                    <option value="1">恐怖</option>
                    <option value="2">学术</option>
                    <option value="3">许丹阳</option>
                </select>
            </div>
            <div id="submit1">
                <span>></span>
                <input type="submit" value="录入" id="submit">
            </div>

        </div>
    </form>

</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/record_book/record_book.js"></script>
</html>
