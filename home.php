<?php
	include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Netflow Monitor System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Cavallone">

	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">
	<link href="css/blockbox.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
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
	<div class="header clearfix">
		<nav>
			<ul>
          	</ul>
        </nav>
    </div>
	<div class="header clearfix">
        <nav>
            <ul>
            </ul>
        </nav>
    </div>
	<div class="header clearfix">
        <nav>
            <ul>
            </ul>
        </nav>
    </div>
	<div class="row clearfix">
		<div class="col-md-3 column">
			<?php
				include('sidebar.html');
			?>
		</div>
		<div class="col-md-9 column">
			<div class="jumbotron">
				<h1 class="text-center">
					Network Monitor System
				</h1>
				<p>
					This system monitors the Netflow data in the test topology and provides the packet dump for each node. 
				</p>
			</div>
            <div class="blockquote-box blockquote-primary clearfix">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon-random glyphicon-lg">
                </div>
                <h3>
                    Netflow
				</h3>
                <p>
                    The Netflow information in the topology is recorded in this system.
                </p>
            </div>
            <div class="blockquote-box blockquote-success clearfix">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon glyphicon-flag glyphicon-lg"></span>
                </div>
                <h3>
                    Event
				</h3>
                <p>
                    By analyzing the Netflow data, we generalize some event logs.
                </p>
			</div>
			<div class="blockquote-box blockquote-danger clearfix">
                <div class="square pull-left">
                    <span class="glyphicon glyphicon glyphicon-cloud-download glyphicon-lg"></span>
                </div>
                <h3>
                    Packet
                </h3>
                <p>
                    Also we prepare the pcap file for manager to monitor the network more detailedly.
                </p>
            </div>
		</div>
	</div>
	<footer class="footer">
        <p class="text-center">&copy; 2015 created by Cavallone</p>
    </footer>
</div>
</body>
</html>
