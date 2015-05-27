<?php
	include('session.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" />
	<title>Network Monitor System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="css/daterangepicker-bs3.css" />
	<link href="css/sidebar.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
    <script type="text/javascript" src="js/daterangepicker.js"></script>
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
          		<h1 class="text-center">Setting</h1>
			</div>
		</div>
		<div class="row clearfix">
			<?php
				include('sidebar.html');
			?>
			<div class="col-md-9 column">
            	<blockquote>
					<h3><span class="glyphicon glyphicon-send"></span>    Packets Capturing</h3>
            		<div class="well well-lg">
			  			<form class="form-inline">
                 			<fieldset>
                  				<div class="control-group">
                    				<label class="control-label" for="reservationtime">Choose the start time and end time for capturing</label>
                    				<ul></ul>
									<div class="controls">
                     					<div class="input-prepend input-group input-append">
                       						<span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                       						<input type="text" style="width: 400px" name="reservation" id="reservationtime" class="form-control" value="08/01/2013 1:00 PM - 08/01/2013 1:30 PM"  class="span4"/>
                       						<button class="btn btn-primary" type="submit">Submit</button>
					 					</div>
                    				</div>
                  				</div>
                 			</fieldset>
               			</form>

               			<script type="text/javascript">
               				$(document).ready(function() {
                  			$('#reservationtime').daterangepicker({
                    		timePicker: true,
                    		timePickerIncrement: 1,
                    		format: 'MM/DD/YYYY h:mm A'
                  			}, function(start, end, label) {
                    		console.log(start.toISOString(), end.toISOString(), label);
                  			});
               				});
               			</script>
            		</div>            
				</blockquote>
         	</div>
      	</div>
	</div>
</body>
</html>
