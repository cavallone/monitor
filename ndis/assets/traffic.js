function get_content(){
    $.ajax({
        url:"traffic",
        data:{
            from:$("#from_day").val(),
            to:$("#to_day").val()},
        type:"POST",
        success:function(response){
            $("#content").html(response);
        }
    });
}
