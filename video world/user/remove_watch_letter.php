<?php
include "connection.php";
$id=$_GET['vid'];
$sql_del_watch=mysql_query("delete from watch_letter where vid='$id'");
echo "delete from watch_letter where vid='$id'";
echo $sql_del_watch;
if (isset($sql_del_watch)) {
	header("location:myvideo.php");
}
else{
	echo "error";
}
?>