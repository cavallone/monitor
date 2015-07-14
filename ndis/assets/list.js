$(document).ready(function(){
    // Remove Detail
    function remove_detail(){
        $("td.filter-icon > span").removeClass("glyphicon-minus");
        $("td.filter-icon > span").addClass("glyphicon-plus");
        $(".data-detail").addClass("hide");
        $(".data-detail-now").removeClass("data-detail-now");
    }

    // Filter function
    $("#filter").keyup(function(){
        remove_detail()
        $("table tbody tr.data").hide().filter(":contains("+$("#filter").val()+")").show();
    })

    // Date Search
    $("#calendar").on("click", function(){
        get_content();
    });

    // plus & minus tab function(detail)
    $("td.filter-icon").on("click", function(){
        var glyphicon = $(this).find(".glyphicon");
        var td = $("td", $(this).parent());
        if(glyphicon.hasClass("glyphicon-plus")){
            $("td.filter-icon > span").removeClass("glyphicon-minus");
            $("td.filter-icon > span").addClass("glyphicon-plus");
            glyphicon.removeClass("glyphicon-plus");
            glyphicon.addClass("glyphicon-minus");
            $(".data-detail").addClass("hide");
            $(this).parent().next(".data-detail").removeClass("hide");
            $(".data-detail-now").removeClass("data-detail-now");
            var data_detail_now = $(this).parent().next(".data-detail").find("td");
            $(data_detail_now).addClass("data-detail-now");
            get_detail(td, $(data_detail_now)); //This two params needed by events lists
        }else if(glyphicon.hasClass("glyphicon-minus")){
            remove_detail()
        }
    });
});
