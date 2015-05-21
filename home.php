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

  <!-- Fav and touch icons 
  <link rel="shortcut icon" href="img/favicon.png">
  -->
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
					This system monitors the Netflow data and DNS query data in the test topology of <a href="http://www.testbed.ncku.edu.tw/">Testbed@TWISC</a> for the <a href="http://www.nsb.gov.tw/">National Security Bereau</a>
				</p>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="img/1.jpeg">
						<div class="caption">
							<h2 class="text-center">
								Netflow
							</h2>
							<p>
								This section is about the total Netflow data in the test topology including IP address, port number, protocol, date and time.	
							</p>
							<p>
								<a class="btn btn-danger btn-block" href="flow.php">View</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="img/2.jpeg">
						<div class="caption">
							<h2 class="text-center">
								Netflow Inside Topology
							</h2>
							<p>
								This section is also about Netflow data, but just shows the flows information inside the topology(That means 10.0.0.0/8).
							</p>
							<p>
								<a class="btn btn-danger btn-block" href="flow_inbound.php">View</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="img/3.jpeg">
						<div class="caption">
							<h2 class="text-center">
								DNS Record
							</h2>
							<p>
								This section records the DNS query data including the IP address which queries the DNS server and the domain name it queries.
							</p>
							<p>
								<a class="btn btn-danger btn-block" href="#">View</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
        <p class="text-center">&copy; <a href="http://itlab.ee.ncku.edu.tw/">Internet Technology Lab @NCKU</a> 2015 by C.C. Tu</p>
    </footer>
</div>
</body>
</html>