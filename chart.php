<?php
	include('session.php');
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Network Monitor System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/highcharts.js"></script>
</head>
<body>
	<div class="container">
		<div class="row clearfix">
			<div>
				<nav class="navbar navbar-inverse navbar-fixed-top">
  					<div class="container">
    					<a class="navbar-brand navbar-brand-centered" href="home.php">Network Monitor System</a>
  					</div>
				</nav>
			</div>
		</div>
		<div class="row clearfix">
            <div class="page-header">
                <h1 class="text-center">Netflow Timely Chart</h1>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-3 column">
                <?php
                    include('sidebar.html');
                ?>
            </div>
			<div class="col-md-9 column">
            	<div class="col-md-12 column well" id="flowchart"></div>
			 	<div class="col-md-12 column well" id="bytechart"></div>
			 	<div class="col-md-12 column well" id="pktchart"></div>
			</div>
		</div>
		<div class="row clearfix">
			<footer class="footer">
				<p class="text-center">...appreciate evshary's help...</p>
			</footer>
		</div>
	</div>
</body>
</html>
<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pwd = 'csyang';
	$database = 'netflow_system';
	$table = 'plots';

	if (!mysql_connect($db_host, $db_user, $db_pwd))
		die("Can't connect to database");
	if (!mysql_select_db($database))
		die("Can't select database");
	$result = mysql_query("SELECT * FROM {$table} order by ID DESC LIMIt 30");

	$x = array();
	$flow = array();
	$byte = array();
	$pkt = array();
	while($row = mysql_fetch_row($result))
	{
		$str = explode(" ", $row[1]);
		$newstr = substr($str[1], 0, 5);
		array_push($x, $newstr);
		array_push($flow, $row[2]);
		array_push($byte, $row[3]);
		array_push($pkt, $row[4]);
	}
?>
<script>
	$(function () {
    $('#flowchart').highcharts({
        title: {
            text: 'Flow Count',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: 10.0.0.0/8',
            x: -20
        },
        xAxis: {
            categories: [<?php echo "'$x[28]', '$x[26]', '$x[24]', '$x[22]', '$x[20]', '$x[18]', '$x[16]', '$x[14]', '$x[12]', '$x[10]', '$x[8]', '$x[6]', '$x[4]', '$x[2]', '$x[0]'";?>]
        },
        yAxis: {
            title: {
                text: 'Count'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'flow',
            data: [<?php echo "$flow[28], $flow[26], $flow[24], $flow[22], $flow[20], $flow[18], $flow[16], $flow[14], $flow[12], $flow[10], $flow[8], $flow[6], $flow[4], $flow[2], $flow[0]";?>]
        } ]
    });
});
</script>
<script>
    $(function () {
    $('#bytechart').highcharts({
        title: {
            text: 'Byte Count',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: 10.0.0.0/8',
            x: -20
        },
        xAxis: {
            categories: [<?php echo "'$x[28]', '$x[26]', '$x[24]', '$x[22]', '$x[20]', '$x[18]', '$x[16]', '$x[14]', '$x[12]', '$x[10]', '$x[8]', '$x[6]', '$x[4]', '$x[2]', '$x[0]'";?>]
        },
        yAxis: {
            title: {
                text: 'byte'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'byte',
            data: [<?php echo "$byte[28], $byte[26], $byte[24], $byte[22], $byte[20], $byte[18], $byte[16], $byte[14], $byte[12], $byte[10], $byte[8], $byte[6], $byte[4], $byte[2], $byte[0]";?>]
        } ]
    });
});
</script>
<script>
    $(function () {
    $('#pktchart').highcharts({
        title: {
            text: 'Packet Count',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: 10.0.0.0/8',
            x: -20
        },
        xAxis: {
            categories: [<?php echo "'$x[28]', '$x[26]', '$x[24]', '$x[22]', '$x[20]', '$x[18]', '$x[16]', '$x[14]', '$x[12]', '$x[10]', '$x[8]', '$x[6]', '$x[4]', '$x[2]', '$x[0]'";?>]
        },
        yAxis: {
            title: {
                text: 'Count'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'packet',
            data: [<?php echo "$pkt[28], $pkt[26], $pkt[24], $pkt[22], $pkt[20], $pkt[18], $pkt[16], $pkt[14], $pkt[12], $pkt[10], $pkt[8], $pkt[6], $pkt[4], $pkt[2], $pkt[0]";?>]
        } ]
    });
});
</script>
