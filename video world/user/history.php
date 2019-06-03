<?php
session_start();
if (isset($_SESSION['user'])) {
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
    <ul class="nav navbar-nav">
    	<li><input type="text" class="form-control" placeholder="Search..." ></li>
    	<li><button class="btn btn-default">Search</button></li>
    	<li><span class="fa fa-upload" style="font-size: 27px;margin-top: 57%;color: #a0a2a2;"></span></li>
    </ul>
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
	<div class="col-sm-9 white-bg">
	<?php 
						include("connection.php");
						$uid=$_SESSION['user'];
						$sql_sel_vid="select * from history where uid='$uid'";
						//echo $sql_sel_vid;
						$res_sel_vid=mysql_query($sql_sel_vid);
						while ($arr_vid=mysql_fetch_array($res_sel_vid)) {
							$vid=$arr_vid['vid'];
							$sql_sel_video=mysql_query("select * from video where id='$vid'");
							//echo "select * from video where id='$vid'";
							while ($arr_video=mysql_fetch_array($sql_sel_video)) {
						
	?>		
		<div class="row">
			<div class="col-sm-4" class="video-tag">
				<a href="sivay.php"><img src=<?php echo $arr_video['img'];?> class="img-responsive"></a>
						
			</div>
			<div class="col-sms-8">
				<a href="sivay.php?id=<?php echo $arr_video['id']?>"><h4><?php echo $arr_video['name'];?></h4></a>
			</div>
		</div>
	<?php
}
		}
	?>
		
	</div>
</body>
</html>
<?php
}
else
{
	header("location:loginform/index.php");
}
?>