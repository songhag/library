<?php
require_once "../Controller/ResisterController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/register/register.css" type="text/css" rel="stylesheet">
    <script src="../content/aaa_JQ/jquery-1.8.0.js">
    </script>
    <script src="../content/register/register.js"></script>
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
        注册
    </div>
    <form id="form" action="../Controller/ResisterController.php" method="post">
        <div class="input_box2">
            <div class="input_box">
                <span>用户名</span>
                <input id="name" type="text" value="" name="username" placeholder="用户名" class="text" oninput="input_bc(this)" data="1">
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>密码</span>
                <input id="password" type="text" value="" name="password" placeholder="密码" class="text" oninput="input_bc(this)" data="2" >
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>真实姓名</span>
                <input id="username" type="text" value="" name="name" placeholder="真实姓名" class="text" oninput="input_bc(this)" data="3">
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>电话号码</span>
                <input id="phoneNumber" type="text" value="" name="phoneNumber" placeholder="电话号码" class="text" oninput="input_bc(this)" data="4">
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>身份证</span>
                <input id="idCard" type="text" value="" name="idCard" placeholder="身份证" class="text" oninput="input_bc(this)" data="5">
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>年龄</span>
                <input id="age" type="text" value="" name="age" placeholder="年龄" class="text" oninput="input_bc(this)" data="6">
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>性别</span>
                <select id="gender" name="gender" class="text" onchange="select_bc(this)">
                    <option value="0">--请选择性别--</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                    <option value="3">许丹阳</option>
                </select>
<!--                <input id="gender" type="text" value="" name="gender" placeholder="性别" class="text" oninput="input_bc(this)" data="7">-->
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>类型</span>
                <?php
                echo get_type_list();
                ?>
<!--                <select id="type" name="type" class="text" onchange="select_bc(this)">-->
<!--                    <option value="0">--请选择职业--</option>-->
<!--                    <option value="1">学生</option>-->
<!--                    <option value="2">老师</option>-->
<!--                    <option value="3">许丹阳</option>-->
<!--                </select>-->
                <!--                <input id="type" type="text" value="" name="type" placeholder="类型" class="text" oninput="input_bc(this)" data="10">-->
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box" >
                <span>年级</span>
                <?php
                echo get_name_list();
                ?>
<!--                <input id="grade" type="text" value="" name="grade" placeholder="年级" class="text" oninput="input_bc(this)" data="9">-->
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>班级</span>
                <?php
                echo get_class_name_list();
                ?>
                <!--                <input id="class" type="text" value="" name="class" placeholder="班级" class="text" oninput="input_bc(this)" data="7">-->
            </div>
        </div>
        <div class="input_box2">
            <div class="input_box">
                <span>校卡卡号</span>
                <input id="card_num" type="text" value="" name="card_num" placeholder="校卡卡号" class="text" oninput="input_bc(this)" data="11">
            </div>
        </div>
        <div style="clear: both"></div>
        <div class="input_box2">
            <div id="submit1">
                <span>></span>
                <input type="submit" value="注册" id="submit">
            </div>
        </div>
        <a href="log_in.php">已有账号了？前往登录</a>
    </form>
</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>

</body>
</html>