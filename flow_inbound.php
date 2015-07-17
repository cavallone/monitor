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
					Netflow Raw Data <small>(Just show 50 flows)</small> 
				</h1>
			</div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-3 column">
			<?php
				include('sidebar.html');
			?>
			<div class="offer offer-radius offer-primary">
                <div class="shape">
                    <div class="shape-text">
                        <span class="glyphicon glyphicon-heart"></span>
                    </div>
                </div>
                <div class="offer-content">
                    <h4>
						<strong>Hint:</strong>
                    </h4>
					<ul>
						<li>You can click each row to get more information.</li>
					</ul>
                </div>
			</div>
		</div>
		<div class="col-md-9 column">
			<form action="#" method="get">
                <div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" id="system-search" name="q" placeholder="Search for" required>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
			<table class="table table-striped table-hover table-responsive table-list-search">
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
					$token = 'limit 50';
					include('record2.php');
				?>
				</tbody>
			</table>
			<p>
                <a class="btn btn-primary" href="insideall.php">Read all ...</a>
            </p>
		</div>
	</div>
</div>
<?php
	include('tmp.html');
?>
</body>
</html>
<script>
	$(document).ready(function() {
    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Searching for: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No entries found.</td></tr>');
        }
    });
});
</script>
