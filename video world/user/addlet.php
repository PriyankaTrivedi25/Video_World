<?php
session_start();
include "connection.php";
	if (isset($_SESSION['user'])) {
			$vid=$_GET['vid'];
			$user=$_SESSION['user'];
			echo "select * from user where email='$user'";
			$sql_user=mysql_query("select * from user where email='$user'");
					$row_user=mysql_fetch_array($sql_user);
				 	$uid=$row_user['uid'];
			$sql_insert=mysql_query("INSERT INTO `watch_letter`(`wid`, `vid`, `uid`) VALUES ('','$vid','$user')");
			echo "INSERT INTO `watch_letter`(`wid`, `vid`, `uid`) VALUES ('','$vid','$user')";
				if ($sql_insert) {
					echo "inserted";
					header("location:myvideo.php");
				}
				else{
					echo "error";
				}
			}
			else {
						header("location:loginform/index.php");
					}		
			

?>