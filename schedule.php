<?php
	
	$time = $_POST['reservation'];
	$timelist = explode(" ", $time);
	$startdate = explode("/", $timelist[0]);
	$startstr = $startdate[2]."-".$startdate[0]."-".$startdate[1];
	$shell = "at ".$timelist[1]." ".$startstr;
	echo $shell;

?>
