<?php
include("connection.php");
$cid=$_GET['cid'];
$sql="delete from catagory where cid='$cid'";
$result=mysql_query($sql);
if (isset($result)) {
	
header("location:catagory.php");
}
else{
	echo "error";
}
?>