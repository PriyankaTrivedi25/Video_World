<?php
include("connection.php");
$video_id= $_POST['v_id'];
$status=$_POST['status'];
$uid=$_POST['uid'];

$sql_check="SELECT * FROM `like` where video_id=$video_id and uid=$uid";
$res_check=mysql_query($sql_check);
$num=mysql_num_rows($res_check);
if ($num>0) {
	$sql_update="UPDATE `like` set status='$status' where uid=$uid and video_id=$video_id";
	$res_update=mysql_query($sql_update);
}
else{
	$sql_insert="INSERT INTO `like` (`video_id`,`status`,`uid`) VALUES ($video_id,'$status',$uid)";
	$res_insert=mysql_query($sql_insert);
}
?>