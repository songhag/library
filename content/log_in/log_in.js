var e=document.getElementById("main_box");
var d=e.getElementsByTagName("span");
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
    console.log(f.value);
}