<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Netflow Monitor</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <script src="js/html5shiv.js"></script>
	<link href="css/justified-nav.css" rel="stylesheet">

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
 
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="masthead">
			<nav>
				<ul class="nav nav-justified">
            		<li><a href="index.html">Home</a></li>
            		<li class="active"><a href="flow.php">Netflow</a></li>
            		<li><a href="flow_inbound.php">Netflow Inbound</a></li>
            		<li><a href="#">DNS query record</a></li>
            		<li><a href="#">About</a></li>
            		<li><a href="#">Logout</a></li>
          		</ul>
			</nav>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h1 class="text-center">
					Netflow <small>(just show top 30 flows from now on)</small> 
				</h1>
			</div>
			<table class="table table-striped table-hover table-responsive">
				<thead>
					<tr>
						<th>
							ID
						</th>
						<th>
							Date
						</th>
						<th>
							Time
						</th>
						<th>
							Protocol
						</th>
						<th>
                            Source IP
                        </th>
						<th>
                            Source Port
                        </th>
						<th>
                            Destination IP
                        </th>
						<th>
                            Destination Port
                        </th>
					</tr>
				</thead>
				<tbody>
				<?php
					include('record.php');
				?>
				</tbody>
			</table>
			<p>
				<a class="btn btn-primary btn-lg" href="#">Read more ...</a>
			</p>
		</div>
	</div>
</div>
</body>
</html>
