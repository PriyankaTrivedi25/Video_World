<?php
include("connection.php");
$vid=$_GET['vid'];
$sql="delete from video where id='$vid'";
$result=mysql_query($sql);
if (isset($result)) {
	
header("location:upload.php");
}
else{
	echo "error";
}
?>