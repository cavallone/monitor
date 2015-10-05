<?php
    $sc = 'ScoringBoard';
    $user = 'UserRoute';
    $fire = 'FireWall';
    $web = 'WebSite';
    $boss = 'BigBoss';
    $staff = 'Staff';
	$fileserver= 'FileServer';
	$webin = 'WebSiteInside';

	$db_host = 'localhost';
	$db_user = 'root';
	$db_pwd = 'csyang';

	$database = 'nsb_netflow';
	$table = 'record';

	if (!mysql_connect($db_host, $db_user, $db_pwd))
		die("Can't connect to database");

	if (!mysql_select_db($database))
		die("Can't select database");

	$result = mysql_query("SELECT * FROM {$table} order by ID DESC {$token}");
	
	if (!$result)
		die("Query to show fields from table failed");
	
	$i = 1;
	$file = fopen("tmp.html", "w+");
	$s1 = "<div class=\"modal fade\" id=\"myModal";
	$s2 = "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  				<div class=\"modal-dialog modal-lg\">
    			<div class=\"modal-content\">
      			<div class=\"modal-header\">
        		<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        		<h4 class=\"modal-title\" id=\"myModalLabel\">Diagram</h4>
      			</div>
      			<div class=\"modal-body\">\n";
	$s3 = "</div>
      		<div class=\"modal-footer\">
        	<button type=\"button\" class=\"btn btn-primary\" data-dismiss=\"modal\">Close</button>
      		</div>
    		</div>
  			</div>
			</div>";

	while($row = mysql_fetch_row($result))
	{
		$rowstr = implode("",$row);

		if (false !== ($rst = strpos($rowstr, '10.8.0.'))){
			continue;
		}
		else{
			echo "<tr data-toggle=\"modal\" data-target=\"#myModal".(string)$i."\">";
        	$s = $s1.(string)$i.$s2;
			foreach($row as $cell)
				echo "<td>$cell</td>";
		
			if (false !== ($rst = strpos($rowstr, $sc))){
				if (false !== ($rst = strpos($rowstr, $user))){
                	$str = $s."<img src=\"picture/sc-user.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
            	elseif (false !== ($rst = strpos($rowstr, $fire))){
                	$str = $s."<img src=\"picture/sc-fire.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
            	elseif (false !== ($rst = strpos($rowstr, $web))){
                	$str = $s."<img src=\"picture/sc-web.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
            	elseif (false !== ($rst = strpos($rowstr, $boss))){
                	$str = $s."<img src=\"picture/sc-boss.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $staff))){
                	$str = $s."<img src=\"picture/sc-staff.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $fileserver))){
                	$str = $s."<img src=\"picture/sc-file.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $webin))){
					$str = $s."<img src=\"picture/sc-webin.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				else{
					$str = $s."<img src=\"picture/sc.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
        	}	

			elseif (false !== ($rst = strpos($rowstr, $user))){
				if (false !== ($rst = strpos($rowstr, $fire))){
					$str = $s."<img src=\"picture/user-fire.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
				elseif (false !== ($rst = strpos($rowstr, $web))){
					$str = $s."<img src=\"picture/user-web.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
				elseif (false !== ($rst = strpos($rowstr, $boss))){
					$str = $s."<img src=\"picture/user-boss.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
				elseif (false !== ($rst = strpos($rowstr, $staff))){
                	$str = $s."<img src=\"picture/user-staff.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $fileserver))){
                	$str = $s."<img src=\"picture/user-file.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $webin))){
					$str = $s."<img src=\"picture/user-webin.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				} 
				else{
					$str = $s."<img src=\"picture/user.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
			}

			elseif (false !== ($rst = strpos($rowstr, $fire))){
				if (false !== ($rst = strpos($rowstr, $web))){
					$str = $s."<img src=\"picture/fire-web.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
				elseif (false !== ($rst = strpos($rowstr, $boss))){
					$str = $s."<img src=\"picture/fire-boss.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
				elseif (false !== ($rst = strpos($rowstr, $staff))){
                	$str = $s."<img src=\"picture/fire-staff.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $fileserver))){
                	$str = $s."<img src=\"picture/fire-file.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $webin))){
					$str = $s."<img src=\"picture/fire-webin.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
				else{
					$str = $s."<img src=\"picture/fire.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
			}

			elseif (false !== ($rst = strpos($rowstr, $web))){
				if (false !== ($rst = strpos($rowstr, $boss))){
                	$str = $s."<img src=\"picture/web-boss.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
        		}
				elseif (false !== ($rst = strpos($rowstr, $staff))){
                	$str = $s."<img src=\"picture/web-staff.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $fileserver))){
                	$str = $s."<img src=\"picture/web-file.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				elseif (false !== ($rst = strpos($rowstr, $webin))){
                	$str = $s."<img src=\"picture/web-webin.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				else{
					$str = $s."<img src=\"picture/web.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
			}	
		
			elseif (false !== ($rst = strpos($rowstr, $boss))){
            	if (false !== ($rst = strpos($rowstr, $staff))){
                	$str = $s."<img src=\"picture/boss-staff.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
            	elseif (false !== ($rst = strpos($rowstr, $fileserver))){
                	$str = $s."<img src=\"picture/boss-file.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
            	elseif (false !== ($rst = strpos($rowstr, $webin))){
                	$str = $s."<img src=\"picture/boss-webin.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				else{
					$str = $s."<img src=\"picture/boss.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
        	}	

			elseif (false !== ($rst = strpos($rowstr, $staff))){
            	if (false !== ($rst = strpos($rowstr, $fileserver))){
                	$str = $s."<img src=\"picture/staff-file.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
            	elseif (false !== ($rst = strpos($rowstr, $webin))){
                	$str = $s."<img src=\"picture/staff-webin.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
            	}
				else{
					$str = $s."<img src=\"picture/staff.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
        	}
			elseif (false !== ($rst = strpos($rowstr, $fileserver))){
				if (false !== ($rst = strpos($rowstr, $webin))){
					$str = $s."<img src=\"picture/file-webin.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
				else{
					$str = $s."<img src=\"picture/file.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
				}
			}	
			else{
				$str = $s."<img src=\"picture/webin.png\" class=\"img-responsive\" alt=\"Responsive image\">\n";
			}

			$sfinal = $str.$s3."\n";
			fwrite($file,$sfinal);

			echo "</tr>\n";

			$i++;
		}
	}
	fclose($file);	
	mysql_free_result($result);
?>
