<?php
$conn=mysql_connect("localhost","root","");
if ($conn) 
{
mysql_select_db("video word",$conn);
}
else
{
	echo "error in connection";
}
?>
