function get_detail(td, data_detail_now){
    $.ajax({
        url:"events/detail",
        data:{
            from:$("#from_day").val(),
            to:$("#to_day").val(),
            ip:$(td[1]).text()
        },
        type:"POST",
        success:function(response){
            $(".data-detail-now").html(response);
            // Draw timeline
            $.getJSON('/ndis/events/timeline/'+$("#from_day").val()+'/'+$("#to_day").val()+'/'+$(td[1]).text(),
                function(data){
                    plots($(data_detail_now).find(".timeline-plot"), data);
            });
        }
    });
}

function get_content(){
    $.ajax({
        url:"events",
        data:{
            from:$("#from_day").val(),
            to:$("#to_day").val()},
        type:"POST",
        success:function(response){
            $("#content").html(response);
        }
    });
}

$(document).ready(function(){
    $(".warn-icon").on("click", function(){
        var td = $("td", $(this).parent());
        $("#targetIP").val($(td[1]).text());
    });
    $("#warnIP").on("click", function(){
        $.ajax({
            url:"events/warnIP",
            data:{
                ip:$("#targetIP").val(),
                content:$("#warn_content").val()
            },
            type:"POST",
            success:function(response){
                alert(response);
                get_content();
            },
            beforeSend: function(){
                var ajaxLoader = "<div align='center'><img src='/ndis/assets/images/loading.gif'></div>";
                $("#content").html(ajaxLoader);
            }
        });
    });
});

function plots(plots_pos, data) {
    window.chart1 = new Highcharts.Chart({
        chart: {
            renderTo: plots_pos[0],
            type: 'columnrange',
            inverted: true
        },
        
        title: {
            text: "Event Timeline"
        },
    
        xAxis: {
            categories: data[0]
        },
    
        yAxis: {
            type: 'datetime',
            labels: {
                formatter: function () {
                    var time_val = (new Date(this.value));//.toUTCString();
                    return Highcharts.dateFormat('%H:%M', time_val);
                    //return Highcharts.dateFormat('%Y-%m-%d %H:%M', time_val);
                }
            }
        },

        colors: [
            '#FF0000'
        ],
    
        legend: {
            enabled: true
        },
        
        plotOptions: {
            columnrange: {
                grouping: false
            }
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b> from <b>' + Highcharts.dateFormat('%Y-%m-%d %H:%M', new Date(this.point.low)) + '</b> to <b>' + Highcharts.dateFormat('%Y-%m-%d %H:%M', new Date(this.point.high)) + '</b>';
            }
        },
    
        series: [{
            name: 'Event',
            stack: 'Tasks',
            data: data[1]
        }]
    });
}
