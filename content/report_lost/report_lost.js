$(document).ready(function (){
    $("#select_type").submit(function (){
        var c=$(".row_3");
        var d=$(".row_5");
        var checkedOfAll=document.getElementsByClassName("delay");//其实是lost

        data="lost_book_id=";
        for (var i=0; i<checkedOfAll.length;i++)
        {
            if (checkedOfAll[i].checked==true)
            {
                data+=checkedOfAll[i].getAttribute("data").trim();
                data+="∰";
            }
        }
        console.log(data);
        data=data.substr(0,data.length-1);
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
                        b+=$(c[i+1]).text().trim()+"挂失成功，等待管理员通过\n";
                    }
                    else {
                        b+=$(c[i+1]).text().trim()+"挂失失败\n";
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