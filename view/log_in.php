<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/log_in/log_in.css" type="text/css" rel="stylesheet">
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
            <div id="log_in">
                登录
            </div>
            <form id="form" action="../insert_user.php" method="post">
                <div class="input_box">
                    <span>用户名</span>
                    <input type="text" value="" name="name" placeholder="用户名" class="text" oninput="input_bc(this)" data="1">
                </div>
                <div class="input_box">
                    <span>密码</span>
                    <input type="text" value="" name="password" placeholder="密码" class="text" oninput="input_bc(this)" data="2">
                </div>
                <div id="submit1">
                    <span>></span>
                    <input type="submit" value="登录" id="submit">
                </div>
                <a href="#">还没有账号？点击注册</a>
            </form>
    </div>
    <div id="box2">
        <div>
            ©2021 图书管理系统，保留所有权
        </div>
    </div>
</body>
<script src="../content/log_in/log_in.js"></script>
</html>