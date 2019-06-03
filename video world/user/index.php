<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  	<div class="navbar-header">
  		<div class="navbar-brand">
  			<a href="index.html"><img src="logo.png" height="45" width="200"></a>
  		</div>	
  	</div>
  <form action="search.php" method="POST">
    <ul class="nav navbar-nav">
    	<li><input type="text" class="form-control" name="search" placeholder="Search..." ></li>
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
<div class="row" style="margin-right:0px;">
	<div class="col-sm-2">
		<div class="homepanel">
			<ul class="main-menu">
				<li><a href="index.php"><span class="fa fa-home" style="font-size: 20px; margin-right:10%"></span> HOME</a></li>
				<li><a href="popular1.php"><span class="fa fa-fire" style="font-size: 20px; margin-right:10%"></span>POPULAR</a></li>
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
				}

			?>

			</ul>

		</div>
	</div>
	<div class="col-sm-10">
		<div class="video text-center" style="background:url('video/capture.png') center;background-size:cover;height:180px;">
			<div class="col-md-offset-9 col-md-3" style="padding: 15px 0;">
				<video style="width:90%;" autoplay="on" controls="">
					<source src="video/apple.mp4" type="video/mp4">
				</video>
			</div>
		</div>

		<div class="clearfix"></div>
		
		<div class="song-body row" style="margin-right:0px;">
		
			<div class="col-sm-12">
							<?php 
				$q="select * from video";
				$result=mysql_query($q);
				 
						//while ($row=mysql_fetch_array($result)) {
							for ($i=0; $i <12 ; $i++) { 
								$row=mysql_fetch_array($result)
							
							
						?>
				<div class="col-sm-2">
					<div class="song-images">
						<a href="sivay.php?id=<?php echo $row['id']?>"><img src="<?php echo $row['img']?>" class="img-responsive"></a>
						<a href="sivay.php?id=<?php echo $row['id']?>"><h5><?php echo $row['name'];?></h5></a>
					</div>
				</div>
				<?php
			}
			?>
			</div>
		</div>
	</div>
</div>
<section class="container song-body">
	<div class="row">
		
	</div>
</section>

</body>
</html>