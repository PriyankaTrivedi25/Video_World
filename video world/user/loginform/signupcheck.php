<?php
session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("video_world");
$name=$_POST['uname'];
$email=$_POST['email'];
$pass=$_POST['password'];
$phone=$_POST['number'];
$q="INSERT INTO `user`(`uid`, `uname`, `email`, `password`, `contact`) VALUES ('','$name','$email','$pass','$phone')";

$r=mysql_query($q);
if ($r) {
	echo "Registeration successfully";
	header("location:index.php");
	
}
else{
	echo "Registeration is not successfully";
}
?>