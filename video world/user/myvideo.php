<?php

session_start();
if (isset($_SESSION['user'])) {



//echo $catid;
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
    	<li><input type="text" class="form-control" placeholder="Search..." name="search" ></li>
    	<li><button class="btn btn-default">Search</button></li>
    	<li><span class="fa fa-upload" style="font-size: 27px;margin-top: 57%;color: #a0a2a2;"></span></li>
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
				<li><a href="home.html"><span class="fa fa-home" style="font-size: 20px; margin-right:10%"></span> HOME</a></li>
				<li><a href="popular.html"><span class="fa fa-fire" style="font-size: 20px; margin-right:10%"></span>POPULAR</a></li>
				<li><a href="history.php"><span class="fa fa-history" style="font-size: 20px; margin-right:10%"></span>HISTORY</a></li>
				<li><a href="upload.php"><span class="fa fa-user-circle-o" style="font-size: 20px; margin-right:10%"></span>My Channel</a></li>
				<li><a href="myvideo.php"><span class="fa fa-clock-o" style="font-size: 20px; margin-right:10%"></span>Watch later</a></li>
</ul>
			
		</div>
		<div class="homepanel">
			<ul><?php 
						include("connection.php");
						$sql_sel_cat="select * from catagory";
						$res_cat=mysql_query($sql_sel_cat);
						while ($arr_cat=mysql_fetch_array($res_cat)) {
							
						
				?>
				
					<li><a href="catagory.php?cid=<?php echo $arr_cat['cid'];?>"><span class="<?php echo $arr_cat['icon'];?>" style="font-size: 20px; margin-right:10%"></span><?php echo $arr_cat['name'];?></a></li>
								
				<?php
				}

			?>

			</ul>

		</div>
	</div>
	<div class="col-sm-10">
		
		<div class="clearfix"></div>
		
		<div class="song-body row" style="margin-right:0px;">
			<div class="col-sm-12">
			<?php 
						if (isset($_SESSION['user'])) {
						$user=$_SESSION['user'];
						
						$sql_watch=mysql_query("SELECT * FROM `watch_letter` WHERE `uid` = $user");
						//echo "SELECT * FROM `watch_letter` WHERE `uid` = $user";
						if (mysql_num_rows($sql_watch)>0) {
						$j=0;
						while ($row_watch_letter=mysql_fetch_array($sql_watch)) {
							$arr_watch_letter[$j++]=$row_watch_letter['vid'];
						}
						foreach ($arr_watch_letter as $key => $value) {
							$sql_video_sel=mysql_query("select * from video where id='$value'");
							while ($row_video_sel=mysql_fetch_array($sql_video_sel)) {

	
						?>
				<div class="col-sm-2">

					<div class="song-images">
						<a href="sivay.php"><img src="<?php echo $row_video_sel['img'];?>" class="img-responsive"></a>
						<a href="sivay.php?id=<?php echo $row_video_sel['id']?>"><h5><?php echo $row_video_sel['name'];?></h5></a>
					</div>
				</div>
				<?php
						}
					}
				}
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
<?php
}
else
{
	header("location:loginform/index.php");
}
?>