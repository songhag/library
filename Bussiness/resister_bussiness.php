<?php
function get_user_roll_list($data){
    $rows_num = $data->num_rows;
    $str = "<select id='type' name='type' class='text' onchange='select_bc(this)'>
                <option value='0'>--请选择职业--</option>
";
    for ($i=0;$i<$rows_num;$i++)
    {
        //$data->data_seek($i);
        $row = $data->fetch_array();
        $id = $row["id"];
        $rollName = $row["type"];
        $str.="<option value='$id'>$rollName</option>";
    }
    $str.="</select>";

    return $str;
}
function get_grade_list($data){
    $rows_num = $data->num_rows;
    $str = "<select id='grade' name='grade' class='text' onchange='select_bc(this)'>
<option value='0'>--请选择年级--</option>
";

    for ($i=0;$i<$rows_num;$i++)
    {
        //$data->data_seek($i);
        $row = $data->fetch_array();
        $id = $row["id"];
        $rollName = $row["name"];
        $str.="<option value='$id'>$rollName</option>";
    }
    $str.="</select>";

    return $str;
}
function get_class_list($data)
{
    $rows_num = $data->num_rows;
    $str = "<select id='class' name='class' class='text' onchange='select_bc(this)'>
<option value='0'>--请选择班级--</option>
";

    for ($i=0;$i<$rows_num;$i++)
    {
        //$data->data_seek($i);
        $row = $data->fetch_array();
        $id = $row["id"];
        $rollName = $row["name"];
        $grade=$row["grade"];
        $str.="<option value='$id'>$rollName</option>";
    }
    $str.="</select>";

    return $str;
}