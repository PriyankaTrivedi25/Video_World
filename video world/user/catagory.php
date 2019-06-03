<?php
include "connection.php";
session_start();
$catid=$_GET['cid'];

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
    	<li><input type="text" class="form-control" placeholder="Search..." name="search"></li>
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
				<li><a href="myvideo.php"><span class="fa fa-clock-o" style="font-size: 20px; margin-right:10%"></span>Watch later</a></li>			</ul>
			
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
		<?php

				$q2="select * from catagory where cid=$catid";
				$cat2=mysql_query($q2);
					$arr2=mysql_fetch_array($cat2) 
		?>
		<img src="<?php echo $arr2['img'];?>" style="margin-top: 1%;">

		<div class="clearfix"></div>
		
		<div class="song-body row" style="margin-right:0px;">
			<div class="col-sm-12">
			<?php 
				$q="select * from video where cid=$catid";
				$result=mysql_query($q);
				 
						while ($row=mysql_fetch_array($result)) {
							
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