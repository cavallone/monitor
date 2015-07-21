<?php
	include('session.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Network Monitor System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
          		<h1 class="text-center">Topology</h1>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-3 column">
				<?php
					include('sidebar.html');
				?>
			</div>
			<div class="col-md-9 column">
            	<blockquote>
					<img src="picture/original.png" class="img-responsive" alt="Responsive image" width="600">
				</blockquote>
         	</div>
      	</div>
	</div>
</body>
</html>
