$(document).ready(function(){
    service();
    netflow(1);
    $("#slider").slider({
        min: 1,
        max: 12,
        change: function(event, ui){
            netflow(ui.value);
        }
    });
});

function dpi_chart(render,title,y_data,y_title,type,unit){
    $('#'+render).highcharts({
        chart: {
            type:'line',  //what kind of chart type is
            zoomType:'x'  //which dimensions should be zoom
        },
        title:{
            text: title,  //title
            x: -20        //center
        },
        xAxis: {
            minRange:3600000,  //The minimum range to display on this axis
            type: 'datetime',  //The type of axis
            dateTimeLabelFormats:{
                month: '%e. %b',  //%b is month, %e is day
                year: '%b'
            }   
        },
        yAxis: {
            title: { text: y_title },  //y title
            plotLines: [{ value: 0, width: 1, color: '#808080' }],  //the position of the line in axis units
            min: 0,    //The min of yaxis
            tickInterval: 10000,   //Set the unit interval 
        },
        plotOptions: {
            series: {
                marker: { enabled: false }  //the dot on the line is disabled
            }
        },
        tooltip: {
            formatter: function(){
                var t, u, yval;
                if(type == 'time'){
                    t = '%e. %b %H:%M';
                }else{
                    t = '%e. %b';
                }
                if(unit == 'M'){
                    y_title = 'Mega bytes';
                    yval = this.y/1048576;
                }else{
                    if(y_data > 1048576){
                        yval = this.y/1048576;
                        y_title = 'Mega bytes';
                    }
                    yval = this.y;
                }
                return '<b>'+this.series.name+'</b><br/>'+
                    Highcharts.dateFormat(t,this.x)+': '+Highcharts.numberFormat(yval,0,',')+' '+y_title;
            }
        },
        series: y_data
    });
}

function netflow_chart(render,title,y_data,y_title,type,unit){
    $('#'+render).highcharts({
        chart: {
            type:'line',  //what kind of chart type is
            zoomType:'x'  //which dimensions should be zoom
        },
        title:{
            text: title,  //title
            x: -20        //center
        },
        xAxis: {
            minRange:3600000,  //The minimum range to display on this axis
            type: 'datetime',  //The type of axis
            dateTimeLabelFormats:{
                month: '%e. %b',  //%b is month, %e is day
                year: '%b'
            }   
        },
        yAxis: {
            title: { text: y_title },  //y title
            plotLines: [{ value: 0, width: 1, color: '#808080' }],  //the position of the line in axis units
            min: 0,    //The min of yaxis
            tickInterval: 500000,   //Set the unit interval 
        },
        plotOptions: {
            series: {
                marker: { enabled: false }  //the dot on the line is disabled
            }
        },
        tooltip: {
            formatter: function(){
                var t, u, yval;
                if(type == 'time'){
                    t = '%e. %b %H:%M';
                }else{
                    t = '%e. %b';
                }
                if(this.series.name == "packet"){
                    yval = this.y * 10;
                    y_title = "";
                }else if(this.series.name == "flow"){
                    yval = this.y;
                    y_title = "";
                }else if(this.series.name == "byte"){
                    yval = this.y * 10;
                    y_title = "KiloBytes";
                }
                return '<b>'+this.series.name+'</b><br/>'+
                    Highcharts.dateFormat(t,this.x)+': '+
                    Highcharts.numberFormat(yval,0,',')+' '+y_title;
            }
        },
        series: y_data
    });
}

function service(){
    if($('#hourly_service')){
        $.getJSON('/ndis/chart/service',
            function(data){
                if(!data) return;
                dpi_chart('hourly_service','Hourly Statistics',
                       data,'Mega Bytes','time',null);
            });
    }
    if($('#hourly_service_v6')){
        $.getJSON('/ndis/chart/service/6',
            function(data){
                if(!data) return;
                dpi_chart('hourly_service_v6','Hourly Statistics (IPv6)',
                       data,'Mega Bytes','time',null);
            });
    }
};

function netflow(interval){
    if($('#netflow_src')){
        $.getJSON('/ndis/chart/netflow/src/'+interval,
            function(data){
                if(!data) return;
                netflow_chart('netflow_src', 'Netflow Timely Chart Outbound',
                       data,'Units','time',null)
        });
    }
    if($('#netflow_dst')){
        $.getJSON('/ndis/chart/netflow/dst/'+interval,
            function(data){
                if(!data) return;
                netflow_chart('netflow_dst', 'Netflow Timely Chart Inbound',
                       data,'Units','time',null)
        });
    }
}
