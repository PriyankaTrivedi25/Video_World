<?php
session_start();
$conn=mysql_connect("localhost","root","");
if ($conn) 
{
mysql_select_db("video word",$conn);
}
else
{
	echo "error in connection";
}
$uid=$_SESSION['user'];
echo $uid;
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
									move_uploaded_file($tmp, 'upload/'.$random_name.'.'.$extension);	
									$sql="insert into video values('','$title','$description','$random_name.$extension','$size','$type','$cat','$path')";
									echo $sql;
									$result=mysql_query($sql);

									if($result)
									{
										header("location:upload.php");
										$sql_video="SELECT * FROM `video` WHERE `name`='$title'";
										echo $sql_video;
										$res_video=mysql_query($sql_video);
										echo $res_video;
										$arr_vid=mysql_fetch_array($res_video);

										$video_id=$arr_vid['id'];
										echo $video_id;
										$sql_user="INSERT INTO `user_video`(`uid`, `vid`) VALUES ($uid,$video_id)";
										echo $sql_user;
										$res_user=mysql_query($sql_user);
										echo $res_user;
									/*$message="Video Uploaded Successfully!";
									echo $message;*/
									
									}
									else{
										echo "error in uploading";
									}
								}
?>
