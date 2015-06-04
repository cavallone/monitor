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
          		<h1 class="text-center">Packet Analyzing</h1>
			</div>
		</div>
		<div class="row clearfix">
			<?php
				include('sidebar.html');
			?>
			<div class="col-md-9 column">
            	<blockquote>
					<h3><span class="glyphicon glyphicon-download-alt"></span>Pcap Download</h3>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            		<div class="panel panel-success">
						<div class="panel-heading" role="tab" id="panelstaff">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#staff" aria-expanded="true" aria-controls="staff">Staff (10.1.1.2) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="staff" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelstaff">
							<div class="panel-body">
							<?php
								$dir = scandir('/nodecap/staff');
								rsort($dir);
								foreach($dir as $file)
								{
									if (strpos( $file, '.cap') )
									{
										echo "<ul><a href=\"download.php?file=/nodecap/staff/".$file."\">".$file."</a></ul>";
									}
								}
							?>
							</div>
						</div>
            		</div>
					<div class="panel panel-info">
						<div class="panel-heading" role="tab" id="panelweb">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#web" aria-expanded="true" aria-control="web">WebServer (10.1.3.2) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="web" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelweb">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/nodecap/web');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/nodecap/web/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-success">
						<div class="panel-heading" role="tab" id="paneldb">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#db" aria-expanded="true" aria-control="db">DBServer (10.1.4.2) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="db" class="panel-collapse collapse" role="tabpanel" aria-labelledby="paneldb">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/nodecap/db');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/nodecap/db/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-info">
						<div class="panel-heading" role="tab" id="panelboss">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#boss" aria-expanded="true" aria-control="boss">BossComputer (10.1.5.3) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="boss" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelboss">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/nodecap/boss');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/nodecap/boss/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-success">
						<div class="panel-heading" role="tab" id="panelmail">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#mail" aria-expanded="true" aria-control="mail">MailServer (10.1.3.2) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="mail" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelmail">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/nodecap/mail');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/nodecap/mail/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-info">
						<div class="panel-heading" role="tab" id="panelnat">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#nat" aria-expanded="true" aria-control="nat">Nat (10.1.5.2 & 10.1.2.3 & 10.1.3.3 & 10.1.4.3 & 10.1.1.3) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="nat" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelnat">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/nodecap/nat');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/nodecap/nat/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-warning">
                        <div class="panel-heading" role="tab" id="panelcontrol">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordin" href="#control" aria-expanded="true" aria-control="control">Control IPs (192.168.0.0/16) <span class="caret"></span></a>
                            </h4>
                        </div>
                        <div id="control" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelcontrol">
                            <div class="panel-body">
                            <?php
                                $dir = scandir('/nodecap/control');
                                rsort($dir);
                                foreach($dir as $file)
                                {
                                    if (strpos( $file, '.cap') )
                                    {
                                        echo "<ul><a href=\"download.php?file=/nodecap/control/".$file."\">".$file."</a></ul>";
                                    }
                                }
                            ?>
                            </div>
                        </div>
                    </div>
					</div>
				</blockquote>
         	</div>
      	</div>
	</div>
</body>
</html>
