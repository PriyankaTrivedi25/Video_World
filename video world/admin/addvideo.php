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
$title=$_POST['title'];
$description=$_POST['desc'];
echo $description;
$cat=$_POST['cat'];
$path="";
			if(($_FILES["file1"]["type"]=="image/jpeg" )|| ($_FILES["file1"]["type"]=="image/png") && ($_FILES["file1"]["size"]<20000000)) 
									{
										if(($_FILES["file1"]["error"]==0))
											$temp=explode("/",$_FILES["file1"]["type"]);		
											$path ="img/1.$temp[1]";
											move_uploaded_file($_FILES["file1"]["tmp_name"],$path);
								    }


							
								$name = $_FILES['file']['name'];
								$extension = explode('.', $name);
								$extension = end($extension);
								$type = $_FILES['file']['type'];
								$size = $_FILES['file']['size'] ;
								$random_name = rand();
								$tmp = $_FILES['file']['tmp_name'];
								
								
								if ((strtolower($type) != "video/mpg") && (strtolower($type) != "video/wma") && (strtolower($type) != "video/mov") 
								&& (strtolower($type) != "video/flv") && (strtolower($type) != "video/mp4") && (strtolower($type) != "video/avi") 
								&& (strtolower($type) != "video/qt") && (strtolower($type) != "video/wmv") && (strtolower($type) != "video/wmv"))
								{
									$message= "Video Format Not Supported !";

								}else
								{
									move_uploaded_file($tmp, 'user/upload/'.$random_name.'.'.$extension);	
									$sql="insert into video values('','$title','$description','$random_name.$extension','$size','$type','$cat','$path')";
									echo $sql;
									$result=mysql_query($sql);
									if($result)
									{
										header("location:upload.php");
									/*$message="Video Uploaded Successfully!";
									echo $message;*/
									echo $sql;
									}
									else{
										echo "error in uploading";
									}
								}
?>
