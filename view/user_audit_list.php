<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../content/user_audit_list/user_audit_list.css" type="text/css" rel="stylesheet">
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
    <a href="#" id="home"><b><</b> 首页</a>
    <form id="select_type">
        <label id="audit_title">
            账户审核
        </label>
        <div class="audit_box2">
            <div class="audit_box">
                <span>审核类型</span>
                <select id="audit_type" name="audit_type" onchange="select_bc(this)">
                    <option value="2">全部</option>
                    <option value="0">待审核</option>
                    <option value="-1">审核不通过</option>
                    <option value="1">审核通过</option>
                </select>
            </div>
        </div>
    </form>
    <div id="list_box">
        <?php
            require_once "../Controller/audit_controller.php";
            get_audit_list();
        ?>
<!--        <a class="list" href="#">-->
<!--            <span class="name list_span">-->
<!--                <span class="small_word">真实姓名</span>-->
<!--                许丹阳-->
<!--            </span>-->
<!--            <span class="user_name list_span">-->
<!--                <span class="small_word">用户名</span>-->
<!--                xdy-->
<!--            </span>-->
<!--            <span class="sign_date list_span">-->
<!--                <span class="small_word">注册日期</span>-->
<!--                2021/7/1-->
<!--            </span>-->
<!--            <span class="state list_span">-->
<!--                <span class="small_word">状态</span>-->
<!--                审核不通过-->
<!--            </span>-->
<!--            <span class="go list_span">></span>-->
<!--        </a>-->
    </div>
</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/user_audit_list/user_audit_list.js"></script>
</html>