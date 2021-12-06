<?php
function get_book_str($a)
{
    $str='';
    for ($i=0;$i<$a[1]->num_rows;$i++)
    {
        $b=$a[1]->fetch_array();
        $str.='<div class="borrowed_list">
              <div class="row_1">
';
        $g=($i+1);
        error_log($g);
        $str.=$g;
        $str.='</div>
            <div class="row_2">';
        $str.=$b["bookId"];
        $str.='</div>
            <div class="row_3">
        ';
        $str.=$b["name"];
        $str.='</div>
            <div class="row_4">
        ';
        $c=explode(" ",$b["deadline"])[0];
        $str.=$c;
        $str.='</div>
        <div class="row_5">
';
        $d=$b["deadline"];
        $e=date("Y-m-d H:i:s",getdate()[0]);

        error_log($e);
        $f=ceil((strtotime($e)-strtotime($d))/86400/30);
        if ($f<=0)
        {
            $f=0;
        }
        error_log(strtotime($e));
        error_log(strtotime($d));
        error_log($f);
        $str.=$f*10;
        $str.='</div>
</div>
';

    }
    return $str;
}



function get_book_str3($a)
{
    $str='';
    for ($i=0;$i<$a->num_rows;$i++)
    {
        $b=$a->fetch_array();
        $str.='<div class="borrowed_list">
              <div class="row_1">
';
        $g=($i+1);
        error_log($g);
        $str.=$g;
        $str.='</div>
            <div class="row_2">';
        $str.=$b["bookId"];
        $str.='</div>
            <div class="row_3">
        ';
        $str.=$b["name"];
        $str.='</div>
            <div class="row_4">
        ';
        $c=explode(" ",$b["deadline"])[0];
        $str.=$c;
        $str.='</div>
        <div class="row_5">
';
        $str.='
        <input type="checkbox" class="delay" name="delay" data=" 
        ';
        $str.=$b["bookId"];
        $str.='">
</div>
</div>
';

    }
    return $str;
}



function get_book_str2($a)
{
    $str='';
    for ($i=0;$i<sizeof($a);$i++)
    {
        $b=$a[$i][1]->fetch_array();
        $str.='<div class="borrowed_list">
              <div class="row_1">
';
        $g=($i+1);
        error_log($g);
        $str.=$g;
        $str.='</div>
            <div class="row_2">';
        $str.=$b["bookId"];
        $str.='</div>
            <div class="row_3">
        ';
        $str.=$b["name"];
        $str.='</div>
            <div class="row_4">
        ';
        $c=explode(" ",$b["deadline"])[0];
        $str.=$c;
        $str.='</div>
        <div class="row_5">
';
        $d=$b["deadline"];
        $e=date("Y-m-d H:i:s",getdate()[0]);

        error_log($e);
        $f=ceil((strtotime($e)-strtotime($d))/86400/30);
        if ($f<=0)
        {
            $f=0;
        }
        $str.=$f*10;
        $str.='</div>
</div>
';

    }
    return $str;
}
function get_book_str4($a)
{
    $str='';
    for ($i=0;$i<$a->num_rows;$i++)
    {
        $b=$a->fetch_array();
        $str.='<div class="borrowed_list">
              <div class="row_1">
';
        $g=($i+1);
        error_log($g);
        $str.=$g;
        $str.='</div>
            <div class="row_2">';
        $str.=$b["bookId"];
        $str.='</div>
            <div class="row_3">
        ';
        $str.=$b["name"];
        $str.='</div>
            <div class="row_4">
        ';
        $c=explode(" ",$b["deadline"])[0];
        $str.=$c;
        $str.='</div>
        <div class="row_5">
';
        $d=$b["price"];

        $str.=$d;
        $str.='</div>
</div>
';

    }
    return $str;
}