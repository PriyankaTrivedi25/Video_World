<?php
$conn=mysql_connect("localhost","root","");
if ($conn) 
{
mysql_select_db("hostel",$conn);
}
else
{
	echo "error in connection";
}
?>
