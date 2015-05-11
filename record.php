<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pwd = 'csyang';

	$database = 'nsb_netflow';
	$table = 'record';

	if (!mysql_connect($db_host, $db_user, $db_pwd))
		die("Can't connect to database");

	if (!mysql_select_db($database))
		die("Can't select database");

	$result = mysql_query("SELECT * FROM {$table} order by ID DESC limit 30");
	if (!$result)
		die("Query to show fields from table failed");

	while($row = mysql_fetch_row($result))
	{
		echo "<tr>";

		foreach($row as $cell)
			echo "<td>$cell</td>";

		echo "</tr>\n";
	}	
	mysql_free_result($result);
?>
