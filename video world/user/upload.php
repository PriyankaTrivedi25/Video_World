<?php
session_start();
include "connection.php";
	if (isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<style>
		.video_title
		{
			font-size: 16px;
			background: white;
			padding: 10px;
	       
	        width: 98%;
	        margin-left: 5px;
	        margin-top: 10px;
		}

	</style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<div class="navbar-header">
  		<div class="navbar-brand">
  			<a href="index.php"><img src="logo.png" height="45" width="200"></a>
  		</div>	
  	</div>
  <form action="search.php" method="POST">
    <ul class="nav navbar-nav">
    	<li><input type="text" class="form-control" placeholder="Search..." style="width: 500px;"></li>
    	<li><button class="btn btn-default">Search</button></li>
    	<li><a href="upload.php"><span class="fa fa-upload" style="font-size: 27px;color: #a0a2a2;"></a></span></li>
    </ul>
   </form>
    <?php if (isset($_SESSION['user'])) {?>
<a href="loginform/logout.php"><button class="btn btn-default btn-custom pull-right">Log out</button></a>
<?php }else{?>
<a href="loginform/index.php"><button class="btn btn-default btn-custom pull-right">Log in</button></a>
<?php }?>

    
   </div>
</nav>

	<div class="col-sm-2" style="margin-top:10px;">
		<div class="homepanel">
			<ul class="main-menu">
				<li><a href="home.php"><span class="fa fa-home" style="font-size: 20px; margin-right:10%"></span> HOME</a></li>
				<li><a href="popular.php"><span class="fa fa-fire" style="font-size: 20px; margin-right:10%"></span>POPULAR</a></li>
				<li><a href="history.php"><span class="fa fa-history" style="font-size: 20px; margin-right:10%"></span>HISTORY</a></li>
				<li><a href="upload.php"><span class="fa fa-user-circle-o" style="font-size: 20px; margin-right:10%"></span>My Channel</a></li>
				<li><a href="myvideo.php"><span class="fa fa-clock-o" style="font-size: 20px; margin-right:10%"></span>Watch later</a></li>
			</ul>
			
		</div>
		<div class="homepanel">
			<ul><?php 
						include("connection.php");
						$q="select * from catagory";
						$cat=mysql_query($q);
						while ($arr=mysql_fetch_array($cat)) {
					?>				
					<li><a href="catagory.php?cid=<?php echo $arr['cid'];?>"><span class="<?php echo $arr['icon'];?>" style="font-size: 20px; margin-right:10%"></span><?php echo $arr['name'];?></a></li>
				<?php
				}?>

			</ul>
		</div>
	</div>

	<div class="col-sm-10" style="background-color: #fff;padding: 20px 0; margin-top: 10px;">
	<div class="ibox">
		<div class="upload-form ibox-content" style="padding: 20px;">
			<form enctype="multipart/form-data" action="addvideo.php" method="POST"> 
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px;">Choose Video:</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="file" id="fileUpload">
					</div>
				</div>
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px; ">Title:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" >
					</div>
				</div>
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px; ">Description:</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="desc" ></textarea>
					</div>
				</div>
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px;">Video image:</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="file1" id="fileUpload">
					</div>
				</div>
				
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px; ">Category:</label>
					<div class="col-sm-10">
						<select class="form-control" name="cat">
							<?php 
						include("connection.php");
						$q="select * from catagory";
						$cat=mysql_query($q);
						while ($arr=mysql_fetch_array($cat)) {
							
						
				?>
				
					<option value="<?php echo $arr['cid'];?>"><?php echo $arr['name'];?></option>
								
				<?php
				}

			?>
						</select>
					</div>
				</div>
				<div class="row" style="margin:10px 0px;">
					
					<div class="col-sm-offset-5 col-sm-7">
						<button class="btn btn-md btn-danger" type="submit" style="background-color:#C01417; " name="submit">Submit</button>
						<button class="btn btn-md btn-default">Reset</button>
					</div>
				</div>
				<div class="song-body row" style="margin-right:0px;">
		
			<div class="col-sm-12">
							<?php 
				$q="select * from video";
				$result=mysql_query($q);
				 
						//while ($row=mysql_fetch_array($result)) {
							for ($i=0; $i <3 ; $i++) { 
								$row=mysql_fetch_array($result)
							
							
						?>
				<div class="col-sm-4">
					<div class="song-images">
						<a href="sivay.php"><img src="<?php echo $row['img']?>" class="img-responsive"></a>
						<a href="sivay.php?id=<?php echo $row['id']?>"><h5><?php echo $row['name'];?></h5></a>
					</div>
				</div>
				<?php
			}
			?>
			</div>
		</div>
			</form>
		</div>
	</div>
	</div>
	

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("p").hide();
		$("#btn-desc").click(function (){
			$("p").slideToggle();
		});
	});
</script>
</body>
</html>
<?php
}
else{
	header("location:loginform/index.php");
}
?>