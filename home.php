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
  <meta name="author" content="Chia-Cheng, Tu">

	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
<div class="container">
	<div class="header clearfix">
        <nav>
          <ul>
          </ul>
        </nav>
		<h3>
		</h3>
      </div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron">
				<h1 class="text-center">
					Network Monitor System
				</h1>
				<p>
					This system monitors the Netflow data in the test topology and provides the packet dump for each node. 
				</p>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="img/2.jpeg">
						<div class="caption">
							<h3 class="text-center">
								Netflow Event
							</h3>
							<p>
								We analyze the netflow data and generalize some event in the test topology that you can view in this section.
							</p>
							<p>
								<a class="btn btn-primary btn-block" href="ndis">View</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="img/3.jpeg">
						<div class="caption">
							<h3 class="text-center">
								Netflow Raw Data
							</h3>
							<p>
								This section is about Netflow data, and shows the information of flow inside the topology (That means 10.0.0.0/8).
							</p>
							<p>
								<a class="btn btn-primary btn-block" href="flow_inbound.php">View</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="img/4.jpeg">
						<div class="caption">
							<h3 class="text-center">
								Packet Dumping
							</h3>
							<p>
								This section is for users to download the pcap files of nodes in the test topology.The pcap file is made every one hour.
							</p>
							<p>
								<a class="btn btn-primary btn-block" href="packet.php">View</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
        <p class="text-center">&copy; 2015 by Cavallone</p>
    </footer>
</div>
</body>
</html>
