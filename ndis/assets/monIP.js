function get_detail(td){
    $.ajax({
        url:"monIP_detail",
        data:{
            from:$("#from_day").val(),
            to:$("#to_day").val(),
            source:$(td[1]).text(),
            port:$(td[2]).text()},
        type:"POST",
        success:function(response){
            $(".data-detail-now").html(response);
        }
    });
}

function get_content(){
    $.ajax({
        url:"monIP",
        data:{
            from:$("#from_day").val(),
            to:$("#to_day").val()},
        type:"POST",
        success:function(response){
            $("#content").html(response);
        }
    });
}
