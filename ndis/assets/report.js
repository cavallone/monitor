var base;
$(document).ready(function(){
	base = $('.content').first().attr('rel');
	get_flowdata();
	daily_statistics();
	reports();
	detail();
});

setInterval("get_flowdata()",30000);	
function chart(render,title,y,y_title,type,unit){
	var chart = new Highcharts.Chart({
		chart: {
			renderTo:render,
			type:'line',
			zoomType:'x',
		},
		title:{
			text: title,
			x: -20
		},
		xAxis: {
			maxZoom:3600000,
			type: 'datetime',
			dateTimeLabelFormats:{
				month: '%e. %b',
				year: '%b'
			}	
		},
		yAxis: {
			title: { text: y_title },
			plotLines: [{ value: 0, width: 1, color: '#808080' }],
		},
		plotOptions: {
			series: {
				marker: { enabled: false }
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
					if(y > 1048576){
						yval = this.y/1048576;
						y_title = 'Mega bytes';
					}
					yval = this.y;
				}
				return '<b>'+this.series.name+'</b><br/>'+
					Highcharts.dateFormat(t,this.x)+': '+Highcharts.numberFormat(yval,0,',')+' '+y_title;
			}
		},
		series: y
	});
};

function daily_statistics(){
	if($('#daily')){
	//$.getJSON('./cgi/botnetflow.php',
	$.getJSON(base+'report/day',
		//{act:'day'},
		function(data){
			if(!data) return;
			for(var i=0;i<data.y.length;i++){
				for ( var j=0;j<data.y[i].data.length;j++){
					data.y[i].data[j][0] = Date.parse(data.y[i].data[j][0]);
					data.y[i].data[j][1] = parseInt(data.y[i].data[j][1]);
				}
			}		
			chart('daily','Daily Statistics',data.y,'Bytes',null,'M');
		});
	}

	if($('#hourly_service')){
	//$.getJSON('./cgi/botnetflow.php',
	$.getJSON(base+'report/hour/service',
		//{act:'hour',cat:'service'},
		function(data){
			if(!data) return;
			chart('hourly_service','Hourly Statistics',data,'Mega Bytes','time',null);
		});
	}
	if($('#hourly_service_v6')){
	//$.getJSON('./cgi/botnetflow.php',
	$.getJSON(base+'report/hour/service/6',
		//{act:'hour',cat:'service_v6'},
		function(data){
			if(!data) return;
			chart('hourly_service_v6','Hourly Statistics (IPv6)',data,'Mega Bytes','time',null);
		});
	}
	if($('#hourly_mal')){
	//$.getJSON('./cgi/botnetflow.php',
	$.getJSON(base+'report/hour/mal',
		//{act:'hour',cat:'mal'},
		function(data){
			if(!data) return;
			chart('hourly_mal','Hourly Statistics',data,'Bytes','time',null);
		});
	}

};
function detail(){
	if($('#details')){
		var idx = $('#details').attr('rel');
		//$.getJSON("cgi/botnetflow.php",
		$.getJSON(base+"report/detail_show/"+idx,
		//{act:'detail',index:idx},
		function(data){
			if(!data) return;	
			$('#details').html('<p>Type: '+data.service+'</p>'+
					'<p>Source: '+data.src_ip+' (port: '+data.src_port+')</p>'+
					'<p>Destination: '+data.dst_ip+' (port: '+data.dst_port+')</p>'+
					'<p>Protocol: '+data.protocol+'</p>'+
					'<p>Duration: '+data.start_time+' - '+data.end_time+'</p>'+
					'<p>Matched rule: <a href="rule.php">'+data.match_rule+'</a></p>'+
					'<p>Packet count: '+data.pkt_cnt+' ('+data.byte_cnt+' bytes)</p>');
		});
	}
}
function get_flowdata(){
	if($('#botnetflow')){
		
		//$.getJSON("./cgi/botnetflow.php",
		$.getJSON(base+"report/flowlist",
			//{act:'list'},
			function(data){
			if(!data) return;
			var table = new Array();
			data.forEach( function(e){ table.push({ src_ip: e.src_ip,
								dst_ip: e.dst_ip,
								count: e.pkt_cnt +' ('+e.byte_cnt+' kbytes)',
								type: e.service,
								duration: e.start_time + ' -<br>' + e.end_time,
								detail: '<a href="'+base+'report/detail/'+e.index+'">details</a>'})});
			

			$('#botnetflow table').dataTable({
				"aaData":table,
				"aoColumns":[
					{ "mData" : "src_ip" },
					{ "mData" : "dst_ip" },
					{ "mData" : "count" },
					{ "mData" : "type" },
					{ "mData" : "duration" },
					{ "mData" : "detail" },
				], 
				"bDestroy" : "true",
				"bProcessing" : true,
			});
		});	
	}
	if($('#mal_traffic')){
		//$.getJSON("./cgi/botnetflow.php",
		$.getJSON(base+"report/flowlist/mal",
			//{act:'list',cat:'mal'},
			function(data){
			if(!data) return;
			var table = new Array();
			data.forEach( function(e){ table.push({ src_ip: e.src_ip,
								dst_ip: e.dst_ip,
								count: e.pkt_cnt +' ('+e.byte_cnt+' kbytes)',
								type: e.service,
								duration: e.start_time + ' -<br>' + e.end_time,
								detail: '<a href="'+base+'report/detail/'+e.index+'">details</a>'})});

			$('#mal_traffic table').dataTable({
				"aaData":table,
				"aoColumns":[
					{ "mData" : "src_ip" },
					{ "mData" : "dst_ip" },
					{ "mData" : "count" },
					{ "mData" : "type" },
					{ "mData" : "duration" },
					{ "mData" : "detail" },
				], 
				"bDestroy" : "true",
				"bProcessing" : true,
			});
		});	
	}
	if($('#service')){
/*
	$.getJSON("./cgi/botnetflow.php",
		{act:'list',cat:'service'},
		function(data){
		$('#b_header table').html('<tr><td class="span3" >Source</td><td class="span3">Destination</td><td class="span2">Protocol</td><td class="span3">Packet / Byte count</td><td class="span3">type / Rule</td><td >Duration</td></tr>');
		$('#service table').empty();
	for(var i=0;i<data.length;i++){
		$('#service table').append('<tr><td class="span2">'+data[i].src_ip+' : '+data[i].src_port+'</td><td class="span2">'+data[i].dst_ip+' : '+data[i].dst_port+'</td><td class="span1">'+data[i].protocol+'</td><td>'+data[i].pkt_cnt+' ('+data[i].byte_cnt+' bytes)</td><td>'+data[i].service+'('+data[i].match_rule+')</td><td>'+data[i].start_time+' - '+data[i].end_time+'</td></tr>');
		}
	});*/
	}
};
function reports(){
	if($('#reports')){
	//$.getJSON("./cgi/botnetflow.php",
	$.getJSON(base+"report/daily_report",
		//{act:'report'},
		function(data){
			if(!data) return;
			for(var i=0;i<data.length;i++){
				$('#reports').append('<li><a href="'+data[i].link+'" target="_blank">'+data[i].date+'</a></li>');
			}
		});
	}
	if($('#reports_service')){
	//$.getJSON("./cgi/botnetflow.php",
	$.getJSON(base+"report/daily_report/service",
		//{act:'report',cat:'service'},
		function(data){
			if(!data) return;
			for(var i=0;i<data.length;i++){
				$('#reports_service').append('<li><a href="'+data[i].link+'" target="_blank">'+data[i].date+'</a></li>');
			}
		});
	}
	
	if($('#summaries')){
	//$.getJSON("./cgi/botnetflow.php",
	$.getJSON(base+"report/summary",
		//{act:'summary'},
		function(data){
			if(!data) return;
			for(var i=0;i<data.length;i++){
				$('#summaries').append('<li><a href="'+data[i].link+'" target="_blank">'+data[i].name+'</a></li>');
			}
		});
	}
	if($('#summaries_service')){
	//$.getJSON("./cgi/botnetflow.php",
	$.getJSON(base+"report/summary/service",
		//{act:'summary',cat:'service'},
		function(data){
			if(!data) return;
			for(var i=0;i<data.length;i++){
				$('#summaries_service').append('<li><a href="'+data[i].link+'" target="_blank">'+data[i].name+'</a></li>');
			}
		});
	}
}
