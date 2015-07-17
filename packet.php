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
	<link href="css/sidebar.css" rel="stylesheet">
	<link href="css/badger.css" rel="stylesheet">

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
			<div class="col-md-3 column">
				<?php
					include('sidebar.html');
				?>
			</div>
			<div class="col-md-9 column">
				<div class="offer offer-radius offer-warning">
                	<div class="shape">
                    	<div class="shape-text">
                        	<span class="glyphicon glyphicon-bullhorn"></span>
                    	</div>
                	</div>
                	<div class="offer-content">
                    	<h4>
							<strong>Policy:</strong>
                    	</h4>
						<ul>
							<li>The cycle of generating pcap file is 24 hours.</li>
							<li>All the pcap files are removed every Sunday.</li>
						</ul>
                	</div>
				</div>
            	<blockquote>
					<h3><span class="glyphicon glyphicon-download-alt"></span>Pcap Download</h3>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            		<div class="panel panel-success">
						<div class="panel-heading" role="tab" id="panelsc">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#scoring" aria-expanded="true" aria-controls="scoring">ScoringBoard (10.1.1.1) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="scoring" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelsc">
							<div class="panel-body">
							<?php
								$dir = scandir('/pcap/scoring');
								rsort($dir);
								foreach($dir as $file)
								{
									if (strpos( $file, '.cap') )
									{
										echo "<ul><a href=\"download.php?file=/pcap/scoring/".$file."\">".$file."</a></ul>";
									}
								}
							?>
							</div>
						</div>
            		</div>
					<div class="panel panel-info">
						<div class="panel-heading" role="tab" id="paneluser">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#user" aria-expanded="true" aria-control="user">UserRoute (10.1.2.2 & 10.1.1.2) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="user" class="panel-collapse collapse" role="tabpanel" aria-labelledby="paneluser">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/pcap/userroute');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/pcap/userroute/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-success">
						<div class="panel-heading" role="tab" id="panelfire">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#fire" aria-expanded="true" aria-control="fire">Firewall (10.1.100.3 & 10.1.2.3 & 10.1.10.3) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="fire" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelfire">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/pcap/firewall');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/pcap/firewall/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-info">
						<div class="panel-heading" role="tab" id="panelweb">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#web" aria-expanded="true" aria-control="web">WebSite (10.1.10.1) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="web" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelweb">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/pcap/website');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/pcap/website/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-success">
						<div class="panel-heading" role="tab" id="panelboss">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#boss" aria-expanded="true" aria-control="boss">BigBoss (10.1.100.150) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="boss" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelboss">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/pcap/bigboss');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/pcap/bigboss/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-info">
						<div class="panel-heading" role="tab" id="panelstaff">
                        	<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordin" href="#staff" aria-expanded="true" aria-control="staff">Staff (10.1.100.25) <span class="caret"></span></a>
							</h4>
						</div>
						<div id="staff" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelstaff">
							<div class="panel-body">
                            <?php
                                $dir = scandir('/pcap/staff');
								rsort($dir);
                                foreach($dir as $file)
                                {
									if (strpos( $file, '.cap') )
									{
                                        echo "<ul><a href=\"download.php?file=/pcap/staff/".$file."\">".$file."</a></ul>";
									}
                                }
                            ?>
							</div>
						</div>
                    </div>
					<div class="panel panel-success">
                        <div class="panel-heading" role="tab" id="panelfile">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordin" href="#file" aria-expanded="true" aria-control="file">FileServer (10.1.100.50) <span class="caret"></span></a>
                            </h4>
                        </div>
                        <div id="file" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelfile">
                            <div class="panel-body">
                            <?php
                                $dir = scandir('/pcap/fileserver');
                                rsort($dir);
                                foreach($dir as $file)
                                {
                                    if (strpos( $file, '.cap') )
                                    {
                                        echo "<ul><a href=\"download.php?file=/pcap/fileserver/".$file."\">".$file."</a></ul>";
                                    }
                                }
                            ?>
                            </div>
                        </div>
                    </div>
					<div class="panel panel-info">
                        <div class="panel-heading" role="tab" id="panelwebin">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordin" href="#webin" aria-expanded="true" aria-control="webin">WebSiteInside (10.1.100.1) <span class="caret"></span></a>
                            </h4>
                        </div>
                        <div id="webin" class="panel-collapse collapse" role="tabpanel" aria-labelledby="panelwebin">
                            <div class="panel-body">
                            <?php
                                $dir = scandir('/pcap/websiteinside');
                                rsort($dir);
                                foreach($dir as $file)
                                {
                                    if (strpos( $file, '.cap') )
                                    {
                                        echo "<ul><a href=\"download.php?file=/pcap/websiteinside/".$file."\">".$file."</a></ul>";
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
