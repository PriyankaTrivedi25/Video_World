<?php
session_start();
include"connection.php";
$email=$_POST["email"];
$password=$_POST["password"];
$q="SELECT * FROM `admin` WHERE email='$email' and pass='$password'";
echo $q;
$r=mysql_query($q);
$num=mysql_num_rows($r);
if($num>=1)
{

		$arr=mysql_fetch_row($r);
		$_SESSION['admin']=$arr[0];
			header("location:index.php");
			//echo "Login successfully";

}	

else
{
	$_SESSION["msg"]="Invalid USERNAME or PASSWORD ...";
	header("location:login.php");

}


?>