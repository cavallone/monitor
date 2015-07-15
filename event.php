<?
	include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Network Monitor System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">
	<link href="css/timeline.css" rel="stylesheet">
 
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>

</head>
<body>
	<div class="container">
		<div class="row clearfix">
			<nav class="navbar navbar-inverse navbar-fixed-top">
  				<div class="container">
    				<a class="navbar-brand navbar-brand-centered" href="home.php">Network Monitor System</a>
  				</div>
			</nav>
		</div>
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="page-header">
					<h1 class="text-center">
						Netflow Event Timeline
					</h1>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<?php
				include('sidebar.html');
			?>
			<div class="col-md-9 column">
				<div class="timeline">
					<div class="line text-muted"></div>
					<?php
						$flood = 'Flooding Flow';
						$hori = 'Horizontal Scan';
						$verti = 'Vertical Scan';
						$dconn = 'Dconn';
						$brute = 'Brute Force';

						$db_host = 'localhost';
						$db_user = 'root';
						$db_pwd = 'csyang';
						$database = 'netflow_system';
						$table = 'anomaly_log';

						if (!mysql_connect($db_host, $db_user, $db_pwd))
							die("Can't connect to database");
	
						if (!mysql_select_db($database))
							die("Can't select database");

						$result = mysql_query("SELECT * FROM {$table} order by ID DESC");
						if (!$result)
							die("Query to show fields from table failed");

						while($row = mysql_fetch_row($result))
						{
							echo "<div class=\"separator text-muted\">
									<time>$row[1] ~ $row[2]</time>
								  </div>\n";
							if (false !== ($rst = strpos($row[3], $flood)))
							{
								echo "<article class=\"panel panel-primary\">\n";
								echo "<div class=\"panel-heading icon\">
                						<i class=\"glyphicon glyphicon-tint\"></i>
            						  </div>\n";
								echo "<div class=\"panel-heading\">
                						<h2 class=\"panel-title\">Flooding Flow</h2>
            						  </div>\n";
							}
							elseif (false !== ($rst = strpos($row[3], $hori)))
                            {
                                echo "<article class=\"panel panel-success\">\n";
                                echo "<div class=\"panel-heading icon\">
                                        <i class=\"glyphicon glyphicon-resize-horizontal\"></i>
                                      </div>\n";
                                echo "<div class=\"panel-heading\">
                                        <h2 class=\"panel-title\">Horizontal Scan</h2>
                                      </div>\n";
                            }
							elseif (false !== ($rst = strpos($row[3], $verti)))
                            {
                                echo "<article class=\"panel panel-info\">\n";
                                echo "<div class=\"panel-heading icon\">
                                        <i class=\"glyphicon glyphicon-resize-vertical\"></i>
                                      </div>\n";
                                echo "<div class=\"panel-heading\">
                                        <h2 class=\"panel-title\">Vertical Scan</h2>
                                      </div>\n";
                            }
							elseif (false !== ($rst = strpos($row[3], $dconn)))
                            {
                                echo "<article class=\"panel panel-warning\">\n";
                                echo "<div class=\"panel-heading icon\">
                                        <i class=\"glyphicon glyphicon-screenshot\"></i>
                                      </div>\n";
                                echo "<div class=\"panel-heading\">
                                        <h2 class=\"panel-title\">Distributed Connection</h2>
                                      </div>\n";
                            }
							elseif (false !== ($rst = strpos($row[3], $brute)))
                            {
                                echo "<article class=\"panel panel-danger\">\n";
                                echo "<div class=\"panel-heading icon\">
                                        <i class=\"glyphicon glyphicon-sunglasses\"></i>
                                      </div>\n";
                                echo "<div class=\"panel-heading\">
                                        <h2 class=\"panel-title\">Brute Force</h2>
                                      </div>\n";
                            }
							else
							{
								echo "Something wrong.\n";
							}
							
							echo "<ul class=\"list-group\">
									<li class=\"list-group-item\"><strong>Source IP : </strong>$row[4]</li>
									<li class=\"list-group-item\"><strong>Source Port : </strong>$row[5]</li>
									<li class=\"list-group-item\"><strong>Destination IP : </strong>$row[6]</li>
									<li class=\"list-group-item\"><strong>Destination Port : </strong>$row[7]</li>
									<li class=\"list-group-item\"><strong>Count : </strong>$row[8]</li>
								   </ul>\n";
							echo "</article>\n";
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
