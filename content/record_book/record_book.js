var d ="";
$(document).ready(function(){
    $("#select_type").submit(function(){
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
        var data = $(this).serialize();
        console.log(data);
        $.ajax({
            url:"../Controller/book_controller.php",
            type:"POST",
            data:data,
            success:function(message) {
                if (message == "加入成功") {
                    alert(message);
                    var url_last = "http://"+window.location.host+"/library/view/record_success.php"
                    window.location.href = url_last;
                } else {
                    alert(message);
                }
            }
        })
        return false;

    })
})
function input_bc(f)
{
    var e=document.getElementById("input_box2");
    d=e.getElementsByTagName("span");
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
function select_bc(f) {
    var data = f.value;
    var parent = f.parentElement;
    var span = parent.getElementsByTagName("span")[0];
    if (data == 0) {
        span.style.display = "none";
    } else {
        span.style.display = "block";
    }
}
