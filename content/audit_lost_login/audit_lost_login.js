$(document).ready(function (){
    var e=document.getElementById("main_box2");
    d=e.getElementsByTagName("span");

    $("#form").submit(function() {
        var inputList = $(this).find("input3");
        for (var i = 0; i < inputList.length; i++) {
            if (inputList[i].value == "") {
                alert("请填写对应内容");
                return false;
            }
        }
    })
    $("#select_type").submit(function (){//data 传密码，session传内容
        var c=$(".row_3");
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            url:"../Controller/book_controller.php",
            type:"POST",
            data:data,
            success: function (message) {
                message=message.substr(0,message.length-1);
                message=message.split("∰");
                var b="";
                for (var i=0;i<message.length;i++)
                {
                    if (message[i]=="1")
                    {
                        b+=$(c[i+1]).text().trim()+"挂失取消成功\n";
                    }
                    else {
                        b+=$(c[i+1]).text().trim()+"挂失取消失败\n";
                    }
                }
                alert(b);
                var url_last = 'http://'+window.location.host+'/library/view/home_panel.php';
                window.location.href = url_last;
            }
        })
        return false;
        //console.log(a);
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

