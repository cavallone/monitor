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

	$result = mysql_query("SELECT * FROM {$table} order by ID DESC");
	if (!$result)
		die("Query to show fields from table failed");

	while($row = mysql_fetch_row($result))
	{
		$rowstr = implode("",$row);
		
		if (false !== ($rst = strpos($rowstr, $sc))){
			if (false !== ($rst = strpos($rowstr, $user))){
				continue;
            }
            elseif (false !== ($rst = strpos($rowstr, $fire))){
				continue;
            }
            elseif (false !== ($rst = strpos($rowstr, $web))){
				continue;
            }
            elseif (false !== ($rst = strpos($rowstr, $boss))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $staff))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $fileserver))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $webin))){
				continue;
            }
			else{
				echo "<tr>";

					foreach($row as $cell)
						echo "<td>$cell</td>";

				echo "</tr>\n";
			}
        }
		elseif (false !== ($rst = strpos($rowstr, $user))){
			if (false !== ($rst = strpos($rowstr, $fire))){
				continue;
			}
			elseif (false !== ($rst = strpos($rowstr, $web))){
				continue;
			}
			elseif (false !== ($rst = strpos($rowstr, $boss))){
				continue;
			}
			elseif (false !== ($rst = strpos($rowstr, $staff))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $fileserver))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $webin))){
				continue;
			} 
			else{
				echo "<tr>";

					foreach($row as $cell)
						echo "<td>$cell</td>";

				echo "</tr>\n";
			}
		}
		elseif (false !== ($rst = strpos($rowstr, $fire))){
			if (false !== ($rst = strpos($rowstr, $web))){
				continue;
			}
			elseif (false !== ($rst = strpos($rowstr, $boss))){
				continue;
			}
			elseif (false !== ($rst = strpos($rowstr, $staff))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $fileserver))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $webin))){
				continue;
			}
			else{
				echo "<tr>";

					foreach($row as $cell)
						echo "<td>$cell</td>";

				echo "</tr>\n";
			}
		}
		elseif (false !== ($rst = strpos($rowstr, $web))){
			if (false !== ($rst = strpos($rowstr, $boss))){
				continue;
        	}
			elseif (false !== ($rst = strpos($rowstr, $staff))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $fileserver))){
				continue;
            }
			elseif (false !== ($rst = strpos($rowstr, $webin))){
				continue;
            }
			else{
				echo "<tr>";

					foreach($row as $cell)
						echo "<td>$cell</td>";

				echo "</tr>\n";
			}
		}
		
		elseif (false !== ($rst = strpos($rowstr, $boss))){
            if (false !== ($rst = strpos($rowstr, $staff))){
				continue;
            }
            elseif (false !== ($rst = strpos($rowstr, $fileserver))){
				continue;
            }
            elseif (false !== ($rst = strpos($rowstr, $webin))){
				continue;
            }
			else{
				echo "<tr>";

					foreach($row as $cell)
						echo "<td>$cell</td>";

				echo "</tr>\n";
			}
        }
		elseif (false !== ($rst = strpos($rowstr, $staff))){
            if (false !== ($rst = strpos($rowstr, $fileserver))){
				continue;
            }
            elseif (false !== ($rst = strpos($rowstr, $webin))){
				continue;
            }
			else{
				echo "<tr>";

					foreach($row as $cell)
						echo "<td>$cell</td>";

				echo "</tr>\n";
			}
        }
		elseif (false !== ($rst = strpos($rowstr, $fileserver))){
			if (false !== ($rst = strpos($rowstr, $webin))){
				continue;
			}
			else{
				echo "<tr>";

					foreach($row as $cell)
						echo "<td>$cell</td>";

				echo "</tr>\n";
			}
		}
		else{
			echo "<tr>";

				foreach($row as $cell)
					echo "<td>$cell</td>";

			echo "</tr>\n";
		}
	}	
	mysql_free_result($result);
?>
