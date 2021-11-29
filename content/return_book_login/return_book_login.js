$(document).ready(function (){
    $("#submit3").click(function (){
        var a=$(".row_2");
        var c=$(".row_3");
        if (a.length==1)
        {
            alert("未选择书籍")
            return false;
        }
        var data= "search_id3=";
        for (var i=1;i<a.length;i++)
        {
            data += parseInt($(a[i]).text())+",";
        }
        data=data.substr(0,data.length-1);
        console.log(data);
        $.ajax({
            url:"../Controller/book_controller.php",
            type:"POST",
            data:data,
            success: function (message) {
                var url_last = 'http://'+window.location.host+'/library/view/return_penalty.php';
                window.location.href = url_last;
                // message=message.substr(0,message.length-1);
                // message=message.split("∰");
                // var b="";
                // for (var i=0;i<message.length;i++)
                // {
                //     if (message[i]=="1")
                //     {
                //         b+=$(c[i+1]).text().trim()+"还书成功\n";
                //     }
                //     else {
                //         b+=$(c[i+1]).text().trim()+"还书失败\n";
                //     }
                // }
                // alert(b);
            }
        })
        return false;
        //console.log(a);
    })
    $("#form2").submit(function (){
        var a=$(this).find("input");
        for (var i=0;i<a.length;i++)
        {
            if (a[i].value==""){
                alert("请填写对应内容");
                return false;
            }
        }
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            url:"../Controller/book_controller.php",
            type:"POST",
            data:data,
            success: function (message){
                message=message.split("∰");
                console.log(message);
                if (message[0]==-1){
                    var url_last = 'http://'+window.location.host+'/library/view/404.php';
                    window.location.href = url_last;
                }
                else if (message[0]==0)
                {
                    alert("你未借阅，请重新输入");
                }
                else if (message[0]==3)
                {
                    alert("此书不存在，请重新输入");
                }
                else if (message[0]==1) {
                    var b = $(".row_2");
                    var flag = 0;
                    for (var i = 0; i < b.length; i++) {
                        if (parseInt($(b[i]).text()) == parseInt(a.val())) {
                            alert("此书已输入，请检查");
                            flag = 1;
                        }
                    }
                    if (flag < 1)
                    {
                        var box=$("#box4");
                        var str='<div class="borrowed_list">' +
                            '                        <div class="row_1">' +
                            b.length +
                            '                        </div>' +
                            '                        <div class="row_2">' +
                            message[1] +
                            '                        </div>' +
                            '                        <div class="row_3">' +
                            message[2]+
                            '                        </div>' +
                            '                        <div class="row_4 svg1">' +
                            '                            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><title>trash fill</title><g class="nc-icon-wrapper"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path></g></svg>' +
                            '                        </div>' +
                            '                    </div>'
                        box.html(box.html()+str);
                        alert("已加入");
                        addClick();
                    }
                }
                else {
                    alert("此书不是你的，请检查");
                }
                $("#id").val("");

            }
        })
        return false;
    })
})
function addClick(){
    $(".svg1").click(function (){
        //console.log(123123123123123)
        var a=$(this).parent(".borrowed_list");

        var answer = confirm("del?");
        if (answer){
            a.remove();
        }
        //console.log(a);
    })
}