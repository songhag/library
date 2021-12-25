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
        if (!isset($_SESSION["user_name_4"])||!isset($_SESSION["name_4"]))
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
    <link href="../content/audit_lost_login/audit_lost_login.css" type="text/css" rel="stylesheet">
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
        <a href="audit_lost.php" class="home"><b><</b> 上一步</a>
        <div id="info">
            <div class="name">
                <div class="box1">
                    <span>账号</span>
                    <?php
                    if (isset($_SESSION["user_name_4"]))
                    {
                        echo $_SESSION["user_name_4"];
                    }
                    ?>
                </div>
            </div>
            <div class="name">
                <div class="box1">
                    <span>学生</span>
                    <?php
                    if (isset($_SESSION["name_4"]))
                    {
                        echo $_SESSION["name_4"];
                    }
                    ?>
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
        <div class="title2">
            挂失罚款
        </div>
        <div id="box3">
            <div id="borrowed_list">
                <div id="title" class="borrowed_list">
                    <div class="row_1 font_size">
                        #
                    </div>
                    <div class="row_2 font_size">
                        书籍编号
                    </div>
                    <div class="row_3 font_size">
                        书籍名称
                    </div>
                    <div class="row_4 font_size">
                        归还日
                    </div>
                    <div class="row_5 font_size">
                        罚款金额
                    </div>
                </div>
                <div id="box4">
                    <?php
                    require_once "../Controller/book_controller.php";
                    echo get_lost_book();
                    ?>
                    <!--                                        <div class="borrowed_list">-->
                    <!--                                            <div class="row_1">-->
                    <!--                                                1-->
                    <!--                                            </div>-->
                    <!--                                            <div class="row_2">-->
                    <!--                                                1werty-->
                    <!--                                            </div>-->
                    <!--                                            <div class="row_3">-->
                    <!--                                                java:从入门到放弃-->
                    <!--                                            </div>-->
                    <!--                                            <div class="row_4">-->
                    <!--                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><title>trash fill</title><g class="nc-icon-wrapper"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path></g></svg>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                    <div class="borrowed_list">-->
                    <!--                        <div class="row_1">-->
                    <!--                            1-->
                    <!--                        </div>-->
                    <!--                        <div class="row_2">-->
                    <!--                            1029301923-->
                    <!--                        </div>-->
                    <!--                        <div class="row_3">-->
                    <!--                            java:从入门到放弃-->
                    <!--                        </div>-->
                    <!--                        <div class="row_4">-->
                    <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><title>trash fill</title><g class="nc-icon-wrapper"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path></g></svg>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="borrowed_list">-->
                    <!--                        <div class="row_1">-->
                    <!--                            1-->
                    <!--                        </div>-->
                    <!--                        <div class="row_2">-->
                    <!--                            1029301923-->
                    <!--                        </div>-->
                    <!--                        <div class="row_3">-->
                    <!--                            java:从入门到放弃-->
                    <!--                        </div>-->
                    <!--                        <div class="row_4">-->
                    <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><title>trash fill</title><g class="nc-icon-wrapper"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path></g></svg>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="borrowed_list">-->
                    <!--                        <div class="row_1">-->
                    <!--                            1-->
                    <!--                        </div>-->
                    <!--                        <div class="row_2">-->
                    <!--                            1029301923-->
                    <!--                        </div>-->
                    <!--                        <div class="row_3">-->
                    <!--                            java:从入门到放弃-->
                    <!--                        </div>-->
                    <!--                        <div class="row_4">-->
                    <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><title>trash fill</title><g class="nc-icon-wrapper"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path></g></svg>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="borrowed_list">-->
                    <!--                        <div class="row_1">-->
                    <!--                            1-->
                    <!--                        </div>-->
                    <!--                        <div class="row_2">-->
                    <!--                            1029301923-->
                    <!--                        </div>-->
                    <!--                        <div class="row_3">-->
                    <!--                            java:从入门到放弃-->
                    <!--                        </div>-->
                    <!--                        <div class="row_4">-->
                    <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><title>trash fill</title><g class="nc-icon-wrapper"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path></g></svg>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>

            </div>
            <div id="main_box2">
                <form id="select_type" action="../Controller/book_controller.php" method="post">
                    <div id="box5">
                        <div class="input_box">
                            <span>密码</span>
                            <input id="isbn" type="text" value="" name="auditor_password_lost" placeholder="管理员密码" class="text" oninput="input_bc(this)" data="1">
                        </div>
                    </div>
                    <input type="submit" value="确定" id="submit3">
                </form>
            </div>
        </div>
    </div>
</div>
<div id="box2">
    <div>
        ©2021 图书管理系统，保留所有权
    </div>
</div>
</body>
<script src="../content/audit_lost_login/audit_lost_login.js"></script>
</html>