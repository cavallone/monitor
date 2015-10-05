<?php
	if(isset($_GET['file']))
	{
		$filearr = explode("/", $_GET['file']);
		$filename = array_pop($filearr);
    	header("Content-type:application/force-download");
    	header("Content-Length: " .(string)(filesize($_GET['file'])));
    	header("Content-Disposition: attachment; filename=".$filename);
		header("Content-Transfer-Encoding: binary");
    	readfile($_GET['file']);
	}
?>
