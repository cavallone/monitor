$(document).ready(function(){
    $("form#search").on("submit", function(e){
        e.preventDefault();
        protocol = $("[name=proto]:checked").attr("value");
        port = $("#port").val();
        get_port_data(protocol, port);
    });
});

function get_port_data(protocol, port){
    var proto_num = {"1":"ICMP","6":"TCP","17":"UDP"};
    var proto_name = proto_num[protocol];
    $.getJSON('/ndis/statistics/port_statistics/'+protocol+'/'+port,
        function(data){
            if(!data) return;
            $('#port_statistics').highcharts({
                chart: {
                    type:'line',  //what kind of chart type is
                    zoomType:'x'  //which dimensions should be zoom
                },
                title:{
                    text: "port timeline",  //title
                    x: -20        //center
                },
                xAxis: {
                    type: 'datetime',  //The type of axis
                    dateTimeLabelFormats:{
                        month: '%e',  //%b is month
                        year: '%b'
                    }, 
                    labels: {
                        formatter: function () {
                            var time_val = (new Date(this.value));//.toUTCString();
                            return Highcharts.dateFormat('%Y-%m', time_val);
                        }
                    }
                },
                yAxis: {
                    title: { text: "flows" },  //y title
                    plotLines: [{ value: 0, width: 1, color: '#808080' }],  //the position of the line in axis units
                    min: 0,    //The min of yaxis
                },
                series: [{name: proto_name+" "+port,
                          data: data}]
            });
        }
    );
}
