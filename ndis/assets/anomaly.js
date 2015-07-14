function get_detail(td){
    $.ajax({
        url:"anomaly_detail",
        data:{
            from:$("#from_day").val(),
            to:$("#to_day").val(),
            event_type:$(td[1]).text(),
            srcip:$(td[2]).text(),
            srcport:$(td[3]).text(),
            dstip:$(td[4]).text(),
            dstport:$(td[5]).text()},
        type:"POST",
        success:function(response){
            $(".data-detail-now").html(response);
            $(".download").on("click", function(){
                var detail = $("td", $(this).parent().parent());
                $.ajax({
                    url:"download_log",
                    data:{id:$(detail[0]).text()},
                    type:"POST",
                    success:function(response){
                        window.open("/ndis/log/"+$(detail[0]).text(), "_blank");
                    }
                });
            });
        }
    });
}

function get_content(){
    $.ajax({
        url:"anomaly",
        data:{
            from:$("#from_day").val(),
            to:$("#to_day").val()},
        type:"POST",
        success:function(response){
            $("#content").html(response);
        }
    });
}
