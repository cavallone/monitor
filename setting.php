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
	<link href="css/sweet-alert.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/sweet-alert.min.js"></script>
	<script type="text/javascript" src="js/sweet-alert.js"></script>
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
			<div class="col-md-3 column">
				<?php
					include('sidebar.html');
				?>
			</div>
			<div class="col-md-9 column">
            	<blockquote>
					<h3><span class="glyphicon glyphicon-trash"></span>    Refresh Database</h3>

    				<div class="alert alert-danger">
        				<a class="btn btn-sm btn-danger pull-right sweet-2">Clean</a>
						Clean up the table of <strong>"Netflow"</strong>
    				</div>

					<script>
						document.querySelector('.sweet-2').onclick = function(){
                            swal({
                                title: "Are you sure?",
                                text: "You will not be able to recover the data!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: 'btn-danger',
                                confirmButtonText: 'Yes, delete it!',
                                closeOnConfirm: false,
                                //closeOnCancel: false
                            },
                            function(){
								$.post('sql.php', {value:'record'});
                                swal("Deleted!", "The data in this table has been clean up!", "success");
                            });
                        };
					</script>
				
				</blockquote>
         	</div>
      	</div>
	</div>
</body>
</html>
