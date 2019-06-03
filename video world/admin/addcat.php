<?php
include("connection.php");
$cname=$_POST['cname'];
$iname=$_POST['iname'];
$path="";
			if(($_FILES["file1"]["type"]=="image/jpeg" )|| ($_FILES["file1"]["type"]=="image/png") && ($_FILES["file1"]["size"]<20000000)) 
									{
										if(($_FILES["file1"]["error"]==0))
											$temp=explode("/",$_FILES["file1"]["type"]);		
											$path ="user/img/1.$temp[1]";
											move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
								    }	
				
$q="insert into catagory values('','$cname','$path','$iname')";
echo $q;
$result=mysql_query($q);
if ($result) {
	echo "success";
}
else
{
	echo "error";
}
?>