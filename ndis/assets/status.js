var base = "/ndis/status/";
//initialize CPU
var cpu_array = new Array("dpi_system", "dpi_user",
                           "netflow_system", "netflow_user");
var cpu = {};
cpu_array.forEach(function(entry){
    cpu[entry] = [];
    for(var i=0; i<50; i++){
        cpu[entry].push(0);
    }
});

//initialize memory
var memory_array = new Array("dpi_memory", "netflow_memory");
var memory = {};
memory_array.forEach(function(entry){
    memory[entry] = [];
    for(var i=0; i<50; i++){
        memory[entry].push(0);
    }
});

//set time interval
setInterval("getcpu()",10000);  
setInterval("getmemory()",10000);  
setInterval("getstatus()",30000); 

$(document).ready(function(){
    var cleanData = [];
    cpu_array.forEach(
        function(name){
            var cleanDataEntry = {"name":name, "data":[]};
            for(var i=0; i<50; i++){
                cleanDataEntry["data"].push(0);
            }
            cleanData.push(cleanDataEntry);
        });
    status_chart('CPU_status','CPU status',
                  cleanData,'percent(%)','seconds ago');
    
    var cleanData = [];
    memory_array.forEach(
        function(name){
            var cleanDataEntry = {"name":name, "data":[]};
            for(var i=0; i<50; i++){
                cleanDataEntry["data"].push(0);
            }
            cleanData.push(cleanDataEntry);
        });
    status_chart('Memory_status','Memory status',
                  cleanData,'percent(%)','seconds ago');
    getcpu();
    getmemory();
    getstatus();
});

function status_chart(render,title,y_data,y_title,x_title){
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
            title: { text: x_title },
            reversed: true,
        },
        yAxis: {
            title: { text: y_title },  //y title
            min: 0,    //The min of yaxis
        },
        plotOptions: {
            series: {
                marker: { enabled: false }  //the dot on the line is disabled
            }
        },
        tooltip: {
            formatter: function(){
                return '<b>'+this.series.name+'</b><br/>'+
                    this.x+' seconds ago <br/>'+
                    this.y+' %';
            }
        },
        series: y_data
    });
}

function getcpu(){
    if($('#CPU_status')){
        var cpu_data = {};
        $.when(
            $.ajax({
                url: base+"cpu/dpi",
                dataType: "JSON",
                success: function(data){
                    if(!data) return;
                    cpu_data["dpi_system"] = data.system;
                    cpu_data["dpi_user"] = data.user;
                }
            }),
            $.ajax({
                url: base+"cpu/netflow",
                dataType: "JSON",
                success: function(data){
                    if(!data) return;
                    cpu_data["netflow_system"] = data.system;
                    cpu_data["netflow_user"] = data.user;
                }
            })
        ).done(function(){
            cpu_array.forEach(function(entry){
                cpu[entry].pop();
                cpu[entry].unshift(cpu_data[entry]);
            });

            //This is x axis (seconds ago)
            var x = [];
            for(var i=0; i<50; i++){
                x.push(i*10);
            }

            $('#dpi_status').html("");
            for(var i=0; i<cpu_array.length; i++){
                var data = [];
                for(var j=0; j<x.length; j++){
                    data.push([x[j],cpu[cpu_array[i]][j]]);
                }
                var chart = $("#CPU_status").highcharts();
                chart.series[i].setData(data);
            }
        });
    }
}; 

function getmemory(){
    if($('#Memory_status')){
        var memory_data = {};
        $.when(
            $.ajax({
                url: base+"memory/dpi",
                dataType: "JSON",
                success: function(data){
                    if(!data) return;
                    memory_data["dpi_memory"] = data.used/data.total;
                }
            }),
            $.ajax({
                url: base+"memory/netflow",
                dataType: "JSON",
                success: function(data){
                    if(!data) return;
                    memory_data["netflow_memory"] = data.used/data.total;
                }
            })
        ).done(function(){
            memory_array.forEach(function(entry){
                memory[entry].pop();
                memory[entry].unshift(memory_data[entry]);
            });

            //This is x axis (seconds ago)
            var x = [];
            for(var i=0; i<50; i++){
                x.push(i*10);
            }

            $('#Memory_status').html("");
            for(var i=0; i<memory_array.length; i++){
                var data = [];
                for(var j=0; j<x.length; j++){
                    data.push([x[j],memory[memory_array[i]][j]]);
                }
                var chart = $("#Memory_status").highcharts();
                chart.yAxis[0].update({max:1});
                chart.series[i].setData(data);
            }
        });
    }
}; 

function getstatus(){
    if($('#program')){
        $.getJSON(base+"program",
            function(data){
            var s_l7,s_hd,s_repo;
            if(data && data.xt_layer7){
                s_l7 = "on";
                $("#dpi").addClass("sbar_green");
            }else{
                s_l7 = "off";
                $("#dpi").addClass("sbar_red");
            }
            if(data && data.dpireporter){
                $("#reporter").addClass("sbar_green");
                s_repo = "on&nbsp;(pid&nbsp;:&nbsp;"+data.dpireporter.pid+")";
            }else{
                s_repo = "off";
                $("#reporter").addClass("sbar_red");
            }
            $("#dpi .text").html(s_l7); 
            $("#reporter .text").html(s_repo);
        });
    }
};
