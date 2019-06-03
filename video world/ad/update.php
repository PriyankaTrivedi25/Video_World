<?php
include("connection.php");
$vid=$_POST['vid'];
$cat=$_POST['cat'];
$description=$_POST['desc'];
$nm=$_POST['title'];
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
									move_uploaded_file($tmp, 'upload/'.$random_name.'.'.$extension);	
									//$sql="UPDATE `video word`.`video` SET `name` = '$nm ',`video` = '$random_name.$extension', `catagory` = '$cat' WHERE `video`.`id` = $vid;";
									$sql="UPDATE `video word`.`video` SET `name` = '$nm', `Description` = '$desc', `video` = '$random_name.$extension', `img` = '$path' WHERE `video`.`id` = $vid;";
									$result=mysql_query($sql);
									echo $sql;
									if($result)
									{
										header("location:upload.php");
									/*$message="Video Uploaded Successfully!";
									echo $message;*/
									
									}
									else{
										echo "error in uploading";
									}
								}
?>