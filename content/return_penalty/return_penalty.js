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

