<?php
session_start();
include("connection.php");
if (isset($_SESSION['user']))
 	{
								$uid=$_SESSION['user'];
								$vid=$_POST['vid'];
								$comment=$_POST['comment'];
								$sql_com="insert into comment values('','$comment','$vid','$uid');";
								$res_com=mysql_query($sql_com);
							if (isset($res_com)) {
									echo $res_com;
									header('location:' .$_SERVER['HTTP_REFERER']);
							}
							else{
									echo "error";
								}
	}
	else
	{
		header("location:loginform/index.php");
	}
?>