var e=document.getElementById("main_box");
var d=e.getElementsByTagName("span");
var g=document.getElementById("main_box3");
var h=document.getElementById("main_box2");

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
$(document).ready(function (){
    $("#form").submit(function (){
        var a=$(this).find("input");
        for (var i=0;i<a.length;i++)
        {
            if (a[i].value==""){
                alert("请填写对应内容");
                return false;
            }
        }
        var data = $(this).serialize()+"&type=2";
        $.ajax({
            url:"../Controller/book_controller.php",
            type:"POST",
            data:data,
            success: function (message){
                if (message=="登录成功"){
                    alert(message);
                    var url_last = 'http://'+window.location.host+'/library/view/audit_lost_login.php';
                    window.location.href = url_last;
                }
                else
                {
                    alert(message);
                }
            }
        })
        return false;
    })
})