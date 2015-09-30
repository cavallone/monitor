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
	<link href="css/badger.css" rel="stylesheet">
	<link href="css/jquery.dataTables.min.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/datatable.min.js"></script>

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
            <h1 class="text-center">
                Netflow About User
            </h1>
         </div>
	</div>
	<div class="row clearfix">
		<div class="col-md-3 column">
			<?php
				include('sidebar.html');
			?>
			<a href="#" class="thumbnail" data-toggle="modal" data-target=".topo">
				<img src="picture/original.png" class="img-responsive" alt="Responsive image">
			</a>
		</div>
		<div class="col-md-9 column">
			<table id="pagination" class="table table-striped table-hover table-responsive">
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
						<th>
                            Packet Count
                        </th>
						<th>
                            Byte Count
                        </th>
					</tr>
				</thead>
				<tbody>
				<?php
					include('record.php');
				?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row clearfix">
		<nav class="navbar">
		</nav>
	</div>
</div>
<div class="modal fade topo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <img src="picture/original.png" class="img-responsive" alt="Responsive image">
    </div>
  </div>
</div>
</body>
</html>

<script>
$(document).ready(function(){
	$('#pagination').dataTable();
});
</script>
