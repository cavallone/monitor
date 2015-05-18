<?php
include('session.php');
?>

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
	<link href="css/justified-nav.css" rel="stylesheet">
 
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
                    <li><a href="home.php">Home</a></li>
                    <li><a href="flow.php">Netflow</a></li>
                    <li class="active"><a href="flow_inbound.php">Netflow Inside Topology</a></li>
                    <li><a href="#">DNS query record</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
			</nav>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h1 class="text-center">
					Netflow Inside Topology 
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
					include('record2.php');
				?>
				</tbody>
			</table>
			<p>
                <a class="btn btn-danger disabled" href="#">Read more ...</a>
            </p>
		</div>
	</div>
</div>
<?php
	include('tmp.html');
?>
</body>
</html>
