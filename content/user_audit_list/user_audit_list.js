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