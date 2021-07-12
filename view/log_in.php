<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/log_in.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div id="main_box">
        <div>
            <p id="title">图书管理系统</p>
            <p id="log_in">登录</p>
        </div>
        <div>
            <form action="../insert_user.php" method="post">
                <div class="input_box">
                    <span>用户名</span>
                    <input type="text" value="" name="name" placeholder="name" class="text" oninput="input_bc(this)" data="1">
                </div>
                <div class="input_box">
                    <span>密码</span>
                    <input type="text" value="" name="password" placeholder="password" class="text" oninput="input_bc(this)" data="2">
                </div>
                <div>
                    <input type="submit" value="提交" id="submit">
                </div>
            </form>
        </div>
        <div>
            <a href="#">还没有账号？点击注册</a>
        </div>
    </div>
    <div id="box2">
        <p>©2021 图书管理系统，保留所有权</p>
    </div>
</body>
<script src="../content/log_in.js"></script>
</html>