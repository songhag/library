function select_bc(f)
{
    var data = f.value;
    console.log(data);
    var parent = f.parentElement;
    var span = parent.getElementsByTagName("span")[0];
    if(data==2)
    {
        span.style.display="none";
    }
    else{
        span.style.display="block";
    }
    // console.log(f.value);

    var data = f.value;
    $.ajax({
        url:"../Controller/audit_controller.php",
        type:"POST",
        data:"state="+data,
        success:function(data) {
            $("#list_box").html(data);
        }
    })
}
$(document).ready(function (){
    $(".list").click(function (){
        var id=$(this).find("span[class=application_id]")[0].innerText;
        var url_last = 'http://'+window.location.host+'/library/view/audit_user.php?id='+id;
        window.location.href = url_last;
    });
})