$(document).ready(function(){
    
    // Get the default list
    get_list("blacklist");

    $("#myTab a").click(function(){
        list = $(this).attr("id");
        get_list(list)
    });

});

function get_list(list){
    $.ajax({
        url:"/ndis/conf/iplist/"+list,
        success: function(response){
            $(".ret_data").html(response);
        },
        beforeSend: function(){
            $(".ret_data").html(
                "<img src='/ndis/assets/images/loading.gif'>");
        },
    });

}
