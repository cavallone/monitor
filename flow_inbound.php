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
	<link href="css/navbar-findcond.css" rel="stylesheet">
 
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>


</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="masthead">
			<nav class="navbar navbar-findcond navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="home.php">Network Monitor System</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i> Menu<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="flow.php"><span class="badge"><i class="glyphicon glyphicon-chevron-right"></i></span>Netflow</a></li>
                                    <li><a href="flow_inbound.php"><span class="badge"><i class="glyphicon glyphicon-chevron-right"></i></span>Netflow Inside Topology</a></li>
                                    <li><a href="#"><span class="badge"><i class="glyphicon glyphicon-chevron-right"></i></span>DNS Query Record</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="glyphicon glyphicon-question-sign">About</i><span class="sr-only"></span></a></li>
                            <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout<span class="sr-only"></span></a></li>
                                </ul>
                    </div>
                </div>
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
