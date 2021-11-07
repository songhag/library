<?php
require_once "../model/book_info.php";
require_once "../model/user.php";
require_once "../model/borrow_book.php";

if (isset($_POST["isbn"])&&isset($_POST["name"]))
{
    $a=0;
    $b=$_POST['type'];
    $c=$_POST['name'];
    $d=$_POST['isbn'];
    $e= date("Y-m-d H:i:s",getdate()[0]);
    $f= date("Y-m-d H:i:s",getdate()[0]);
    $g=$_POST['author'];
    session_start();
    $h=$_SESSION["user_id"];
    insert_into_book_info1($a,$b,$c,$d,$e,$f,$g,$h);
}
if (isset($_POST["username"])&&isset($_POST["password"])){
    $a=$_POST["username"];
    $b=$_POST["password"];
    $d=$_POST["type"];
    $c=check_user($a,$b,$d);
    if ($c==1)
    {
        echo "登录成功";
    }
    else{
        echo "登录失败";
    }
}
if (isset($_POST["search_id"]))
{
    $a=$_POST["search_id"];
    $b=check_book($a);
    echo $b;
}
if (isset($_POST["search_id1"]))
{
    $a=$_POST["search_id1"];
//    error_log($a);
    error_log($a);
    error_log(54454656565);
    $c=explode(",",$a);
    $b=0;
    $d="";
    for ($i=0;$i<count($c);$i++)
    {
        $b=insert_borrowbook($c[$i]);
        $d.=$b."∰";
    }
    echo $d;
}

if (isset($_POST["search_id2"]))
{
    $a=$_POST["search_id2"];
    $b=check_book($a);
    echo $b;
}
if (isset($_POST["search_id3"]))
{
    $a=$_POST["search_id3"];
//    error_log($a);
    error_log($a);
    error_log(54454656565);
    $c=explode(",",$a);
    $b=0;
    $d="";
    for ($i=0;$i<count($c);$i++)
    {
        $b=insert_borrowbook($c[$i]);
        $d.=$b."∰";
    }
    echo $d;
}








function insert_borrowbook($id)
{
    $a=update_book_info_by_id("state",1,$id);
    if ($a[0]==1)
    {
        session_start();
        $e=$id;
        $f=$_SESSION["id_2"];
        $g=date("Y-m-d H:i:s",getdate()[0]);
        $h=date("Y-m-d H:i:s",getdate()[0]+2592000);
        $i=0;
        $j=date("Y-m-d H:i:s",getdate()[0]);
        $c=insert_into_borrow_book($e,$f,$g,$h,$i,$j);
        if ($c[0]==1)
        {
            return 1;
        }
        else{
            return 0;
        }
    }
    else{
        return 0;
    }
}



function check_book($id)
{
    $a=select_book_info_by_id($id);
    if ($a[0]==1)
    {
        if ($a[1]->num_rows==1)
        {
            $b=$a[1]->fetch_array();
            $c=$b["id"]."∰".$b["name"];
            if ($b["state"]==0)
            {
                return "1"."∰".$c;
            }
            else
            {
                return 2;
            }
        }
        else{
            return 0;
        }
    }
    else
    {
        return -1;
    }
}

function check_return_book($id)
{

}



function check_user($user_name,$password,$type)
{
    $a=select_user_by_name_password($user_name,$password);
    if ($a[0]==1&&$a[1]->num_rows==1)
    {
        $b=$a[1]->fetch_array();
        session_start();
        if ($type==0)
        {
            $_SESSION["user_name_2"]=$user_name;
            $_SESSION["id_2"]=$b["id"];
            $_SESSION["name_2"]=$b["name"];
        }
        else{
            $_SESSION["user_name_3"]=$user_name;
            $_SESSION["id_3"]=$b["id"];
            $_SESSION["name_3"]=$b["name"];
        }

        return 1;
    }
    else
    {
        return 0;
    }
}
function insert_into_book_info1($a,$b,$c,$d,$e,$f,$g,$h){
    $isSuccess = insert_into_book_info($a,$b,$c,$d,$e,$f,$g,$h);
    if ($isSuccess == "失败") {
        echo "加入失败";
    }
    else{
        $_SESSION["book_isbn"]=$d;
        $_SESSION["book_name"] = $c;
        $_SESSION["book_author"]=$g;
        $_SESSION["book_type"] = $b;
        echo "加入成功";
    }
}

