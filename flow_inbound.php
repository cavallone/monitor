<?php
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
					Netflow Inside Topology 
				</h1>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<?php
			include('sidebar.html');
		?>
		<div class="col-md-9 column">
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
                <a class="btn btn-primary disabled" href="#">Read more ...</a>
            </p>
		</div>
	</div>
</div>
<?php
	include('tmp.html');
?>
</body>
</html>
