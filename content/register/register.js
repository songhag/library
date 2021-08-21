var d ="";
$(document).ready(function(){
    var e=document.getElementById("main_box");
    d=e.getElementsByTagName("span");

    $("#form").submit(function(){
        var selectList = $(this).find("select");
        var inputList = $(this).find("input");
        for (var i=0; i<selectList.length;i++)
        {
            if (selectList[i].value==0)
            {
                alert("请选择对应的下拉菜单");
                return false;
            }
        }
        for (var i=0;i<inputList.length;i++)
        {
            if(inputList[i].value=="")
            {
                alert("请填写对应内容");
                return false;
            }
        }
        // console.log(3);
        var data = $(this).serialize();
        $.ajax({
            url:"../Controller/ResisterController.php",
            type:"POST",
            data:data,
            success:function(message){

            }
        })
    })


})
function input_bc(f)
{
    var data = f.getAttribute("data");
    if(f.value!="")
    {
        d[data-1].style.display="block";
    }
    else{
        d[data-1].style.display="none";
    }
    // console.log(f.value);
}
function select_bc(f)
{
    console.log(f.id);
    if (f.id == "grade"){
        var grade_val = f.value;
        $.ajax({
            url:"../Controller/ResisterController.php",
            type:"POST",
            data:"gradeId="+grade_val,
            success:function(data){
                $("#class").html(data);
            }
        })
    }
    var data = f.value;
    var parent = f.parentElement;
    var span = parent.getElementsByTagName("span")[0];
    if(data==0)
    {
        span.style.display="none";
    }
    else{
        span.style.display="block";
    }

    // console.log(f.value);
}

