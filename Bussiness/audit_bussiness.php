<?php
function get_audit_list_str($data){
    $rows_num = $data->num_rows;
    error_log($rows_num);
    $str="";
    for ($i=0;$i<$rows_num;$i++)
    {
        $rows_num = $data->num_rows;
        $str.= "<a class='list' href='#'>
            <span class='name list_span'>
            <span class='small_word'>真实姓名</span>
";
        $row = $data->fetch_array();
        $user_name = $row["user_name"];
        $str.="$user_name";
        $str.="</span>
           <span class='user_name list_span'>
           <span class='small_word'>用户名</span>
";
        $name=$row["name"];
        $str.="$name";
        $str.="</span>
           <span class='sign_date list_span'>
           <span class='small_word'>注册日期</span>
";
        $create_time=$row["create_time"];
        $create_time=explode(" ",$create_time);
        $str.="$create_time[0]";
        $str.="</span>
           <span class='state list_span'>
           <span class='small_word'>状态</span>
";
        $state=$row["state"];
        $str.="$state";
        $str.="</span>
           <span class='go list_span'>></span>
           </a>
";
    }
    return $str;
}
//<a class="list" href="#">
//            <span class="name list_span">
//                <span class="small_word">真实姓名</span>
//许丹阳
//            </span>
//            <span class="user_name list_span">
//                <span class="small_word">用户名</span>
//xdy
//            </span>
//            <span class="sign_date list_span">
//                <span class="small_word">注册日期</span>
//2021/7/1
//            </span>
//            <span class="state list_span">
//                <span class="small_word">状态</span>
//审核不通过
//            </span>
//            <span class="go list_span">></span>
//        </a>