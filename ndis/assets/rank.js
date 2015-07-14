var protocol="v4";
var service;
var order="packets";
$(document).ready(function(){
    // Get the service now
    service = $(".active > a").attr("id");
    
    // Get the date yesterday
    var date = new Date();
    date.setDate(date.getDate() - 1);
    var day =date.getDate().toString();
    day = day.length > 1? day:'0'+day;
    var month =(date.getMonth()+1).toString();
    month = month.length > 1? month:'0'+month;
    $("#date").val([date.getFullYear(),month,day].join("-"));
    
    // Get the default rank
    get_rank();

    $("#myTab a").click(function(){
        service = $(this).attr("id");
        get_rank()
    });

    $("#date").datepicker({dateFormat: 'yy-mm-dd'});
});
function get_rank(){
    $.ajax({
        url:"/ndis/statistics/service",
        type:"POST",
        data:{
            service: service,
            protocol: $("[name=IP]:checked").attr("value"),
            date: $("#date").val(),
            order: $("[name=order]:checked").attr("value")
        },
        success: function(response){
            $(".ret_data").html(response);
        },
        beforeSend: function(){
            $(".ret_data").html(
                "<img src='/ndis/assets/images/loading.gif'>");
        },
    });

}
