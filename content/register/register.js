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
    // console.log(f.value);
}
function select_bc(f)
{
    var data = f.value;
    console.log(data);
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