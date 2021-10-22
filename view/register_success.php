<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/register_success/register_success.css" type="text/css" rel="stylesheet">

</head>
<body>
<?php
session_start();
if (!isset($_SESSION["usernameApplication"]))
{
    echo "<script>
    var url_last = 'http://'+window.location.host+'/library/view/register.php';
    window.location.href = url_last;
</script>";
}
?>
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
        注册申请提交成功
    </div>
    <div id="context">
        嗨，<?php session_start(); echo $_SESSION["usernameApplication"];unset($_SESSION["usernameApplication"]) ?>
        ，您的申请已提交至<br>管理员，申请结果我们以短信通知您。
    </div>
</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/register_success/register_success.js"></script>
</html>