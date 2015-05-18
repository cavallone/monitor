<?php
	$staff = 'Staff';
    $nat = 'NAT';
    $web = 'WebServer';
    $db = 'DBServer';
    $boss = 'BossComputer';
    $mail = 'MailServer';
	
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pwd = 'csyang';

	$database = 'nsb_netflow';
	$table = 'record2';

	if (!mysql_connect($db_host, $db_user, $db_pwd))
		die("Can't connect to database");

	if (!mysql_select_db($database))
		die("Can't select database");

	$result = mysql_query("SELECT * FROM {$table}");
	if (!$result)
		die("Query to show fields from table failed");
	
	$i = 1;
	$file = fopen("tmp.html", "w+");
	$s1 = "<div class=\"modal fade\" id=\"myModal";
	$s2 = "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  				<div class=\"modal-dialog\">
    			<div class=\"modal-content\">
      			<div class=\"modal-header\">
        		<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        		<h4 class=\"modal-title\" id=\"myModalLabel\">Diagram</h4>
      			</div>
      			<div class=\"modal-body\">\n";
	$s3 = "</div>
      		<div class=\"modal-footer\">
        	<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      		</div>
    		</div>
  			</div>
			</div>";

	while($row = mysql_fetch_row($result))
	{
		echo "<tr data-toggle=\"modal\" data-target=\"#myModal".(string)$i."\">";
		$s = $s1.(string)$i.$s2;

		foreach($row as $cell)
			echo "<td>$cell</td>";

		$rowstr = implode("",$row);
		
		if (false !== ($rst = strpos($rowstr, $nat))){
			if (false !== ($rst = strpos($rowstr, $web))){
                $str = $s."<img src=\"picture/nw.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
            }
            elseif (false !== ($rst = strpos($rowstr, $db))){
                $str = $s."<img src=\"picture/nd.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
            }
            elseif (false !== ($rst = strpos($rowstr, $boss))){
                $str = $s."<img src=\"picture/nb.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
            }
            elseif (false !== ($rst = strpos($rowstr, $mail))){
                $str = $s."<img src=\"picture/nm.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
            }
			else{
                $str = $s."<img src=\"picture/ns.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
            }
        }

		elseif (false !== ($rst = strpos($rowstr, $staff))){
			if (false !== ($rst = strpos($rowstr, $web))){
				$str = $s."<img src=\"picture/sw.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
			}
			elseif (false !== ($rst = strpos($rowstr, $db))){
				$str = $s."<img src=\"picture/sd.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
			}
			elseif (false !== ($rst = strpos($rowstr, $boss))){
				$str = $s."<img src=\"picture/sb.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
			}
			else{
				$str = $s."<img src=\"picture/sm.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
			}
		}
		elseif (false !== ($rst = strpos($rowstr, $web))){
			if (false !== ($rst = strpos($rowstr, $db))){
				$str = $s."<img src=\"picture/wd.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
			}
			elseif (false !== ($rst = strpos($rowstr, $boss))){
				$str = $s."<img src=\"picture/wb.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
			}
			else{
				$str = $s."<img src=\"picture/wm.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
			}
		}
		elseif (false !== ($rst = strpos($rowstr, $db))){
			if (false !== ($rst = strpos($rowstr, $boss))){
                $str = $s."<img src=\"picture/db.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
        	}
			else{
                $str = $s."<img src=\"picture/dm.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
            }
		}
		else{
			$str = $s."<img src=\"picture/bm.png\" class=\"img-responsive\" alt=\"Cinque Terre\">\n";
		}
		
		$sfinal = $str.$s3."\n";
		fwrite($file,$sfinal);

		echo "</tr>\n";

		$i++;
	}
	fclose($file);	
	mysql_free_result($result);
?>
