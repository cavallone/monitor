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
	<link href="css/tablefilter.css" rel="stylesheet">
	<link href="css/badger.css" rel="stylesheet">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>


</head>

<body>
<div class="container">
	<div class="row clearfix">
		<nav class="navbar navbar-inverse navbar-fixed-top">
  			<div class="container">
    			<a class="navbar-brand navbar-brand-centered" href="flow_inbound.php">Netflow Raw Data</a>
  			</div>
		</nav>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h1 class="text-center">
					Netflow Raw Data <small>(all)</small> 
				</h1>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column filterable">
			<div class="offer offer-radius offer-primary">
				<div class="shape">
					<div class="shape-text">
						<span class="glyphicon glyphicon-search"></span>	
					</div>
				</div>
				<div class="offer-content">
					<h3 class="lead"> 
					</h3>
                	<table>
                    	<thead>
                    		<tr class="filters">
                        		<th><input type="text" class="form-control" placeholder="ID" ></th>
                        		<th><input type="text" class="form-control" placeholder="Date"></th>
                        		<th><input type="text" class="form-control" placeholder="Time"></th>
                        		<th><input type="text" class="form-control" placeholder="Protocol"></th>
                        		<th><input type="text" class="form-control" placeholder="Src. IP"></th>
                        		<th><input type="text" class="form-control" placeholder="Src. Port"></th>
                        		<th><input type="text" class="form-control" placeholder="Dst. IP"></th>
                        		<th><input type="text" class="form-control" placeholder="Dst. Port"></th>
                        		<th><input type="text" class="form-control" placeholder="Pkt. Count"></th>
                        		<th><input type="text" class="form-control" placeholder="Byte Count"></th>
                    		</tr>
                    	</thead>
                	</table>
				</div>
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
					$token = '';
					include('record2.php');
				?>
				</tbody>
			</table>
			<p>
				<a class="btn btn-primary" href="flow_inbound.php">Back to previous page</a>
			</p>
		</div>
	</div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>
