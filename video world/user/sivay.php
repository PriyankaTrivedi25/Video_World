<?php
session_start();
include"connection.php";
$vid=$_GET['id'];
if(isset($_SESSION['user']))
{
	$uid=$_SESSION['user'];
	$sql_sel_user=mysql_query("select * from user where uid=$uid");
	//echo "select * from user where uid=$uid";
	$res_sel_user=mysql_fetch_array($sql_sel_user);
	$user=$res_sel_user['uname'];
	//echo $user;
	$sql_history=mysql_query("select vid  from history where vid=$vid and uid=$uid");
	$num=mysql_num_rows($sql_history);
			if ($num>0) {
				
			}
			else{
			$sql_ins_url=mysql_query("insert into history values('','$uid','$vid')");
			}

$sql_check="SELECT * FROM `like` where video_id=$vid and uid=$uid";
$res_check=mysql_query($sql_check);
$num=mysql_num_rows($res_check);
$row_check=mysql_fetch_array($res_check);
$status=$row_check['status'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<style>
		.video_title,.video-desc,.video-com
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
    <ul class="nav navbar-nav">
    	<li><input type="text" class="form-control" placeholder="Search..."></li>
    	
    	<li><button class="btn btn-default">Search</button></li>
    	<li><a href="upload.php"><span class="fa fa-upload" style="font-size: 27px;color: #a0a2a2;"></a></span></li>
    </ul>
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
					<?php
						$sql_sel_video=mysql_query("select * from video where id='$vid'");
						$arr_video=mysql_fetch_array($sql_sel_video);
					?>
	<div class="col-sm-6">
		<div class="video1 text-center" >
			<video class="pull-left" controls="">
				<source src="<?php echo $arr_video['video'];?>" type="video/mp4" >
			</video>
			<div class="row" style="padding:10px;">
				<div class="col-md-12 video_title">
					<div class="video-heading col-md-12 text-left">
						<h4><?php echo $arr_video['name'];?> </h4>
					</div>
					<div class="col-md-12 video-buttons">
						<?php 
							if (isset($_SESSION['user'])) {
								
							
							$sql="select * from watch_letter where vid='$vid' and uid='$uid'";
							//echo $sql;
							$res_sel_watch=mysql_query($sql);
							$arr_watch=mysql_fetch_array($res_sel_watch);
							$wid=$arr_watch['wid'];
							//echo $wid;
							}
							
						?>
						<div class="row">
							<div class="buttons col-md-8 text-left">
									<?php 	
										if (isset($_SESSION['user'])) {
											if (isset($wid)) {
									?>
									<a href="remove_watch_letter.php?vid=<?php echo $vid?>" data-toggle="tooltip" title="RMOVE WATCH LATER">
										<span class="fa fa-minus" style="font-size: 20px;"></span>
									</a>
									<?php 
											}
											else{
									?>
									
									<a href="addlet.php?vid=<?php echo $vid?>" data-toggle="tooltip" title="WATCH LATER">
										<span class="fa fa-clock-o" style="font-size: 20px;"></span>
									</a>
									
									<?php 	}
										}

										else{ 
									?>
									
										<a href="addlet.php?vid=<?php echo $vid?>" data-toggle="tooltip" title="WATCH LATER"><span class="fa fa-clock-o" style="font-size: 20px;"></span></a>
									
									<?php }
									?>	

									<a href="download.php?filename=<?php echo $arr_video['video'];?>"  data-toggle="tooltip" title="DOWNLOAD"><span class="fa fa-cloud-download" style="font-size: 20px;"></span></a>
									
							</div>
								<?php 
									$sql_like=mysql_query("SELECT * FROM `like` WHERE `video_id`=$vid and status='like'");
									//echo "SELECT * FROM `like` WHERE `video_id`=$vid and status='like'";
									//echo $sql_like;
									if (mysql_num_rows($sql_like)>0) {
									$row_like=mysql_fetch_array($sql_like);
									$num=mysql_num_rows($sql_like);
									//echo $num;
									}
								?>
							<h6 class="col-md-4 like-button text-right" style="color:grey;">
								<?php 

									if(isset($_SESSION['user']) && $num>0 && $status=='like'){ 
									
								?>
									<span class="fa fa-thumbs-up" style="font-size:20px;">
							<?php 
									$sql_like=mysql_query("SELECT * FROM `like` WHERE `video_id`=$vid and status='like'");
									//echo "SELECT * FROM `like` WHERE `video_id`=$vid and status='like'";
									//echo $sql_like;
									if (mysql_num_rows($sql_like)>0) {
									$row_like=mysql_fetch_array($sql_like);
									$num=mysql_num_rows($sql_like);
									//echo $num;
							?>
									</span><?php echo $num; }?>
								<?php }else{ ?>
									<a href="#" id="like" class="like" name="<?php echo $arr_video['id'];?>">
										<span class="fa fa-thumbs-up" style="font-size:20px;"></span>Like
									</a>
								<?php } 
									if(isset($_SESSION['user']) && $num>0 and $status=="unlike"){
								?>

									
										<span class="fa fa-thumbs-down" style="font-size:20px;"></span>Unliked 
									
								<?php } 
									else{
								?>

									<a href="#" id="unlike" class="like" name="<?php echo $arr_video['id'];?>">
										<span class="fa fa-thumbs-down" style="font-size:20px;"></span>Unlike 
									</a>
								<?php } ?>
							</h6>
						</div>
						
						
					</div>

						
				</div>
				<div class="col-md-12 video-desc">
					<button class="btn btn-default btn-block" id="btn-desc">Show More</button>
					<p id="#desc" class="p"><?php echo $arr_video['Description'];?></p>
				</div>
			
				<div class="col-md-12 video-com">
			<form action="addcomment.php" method="post">
					<div class="row">
						<div class="col-md-10">
							<input type="text" placeholder="Enter your Comment" name="comment" class="form-control">
						</div>
					
					<input type="hidden" value="<?php echo $arr_video['id'];?>" name="vid">
						<div class="col-md-2">
							<input type="submit" value="comment"  class="btn btn-block btn-danger">
						</div>
					
					</div>
			</form>
					<div class="row">
						<div class="col-md-12 text-left">
							<?php
								$sql_sel_com=mysql_query("select * from comment where video_id=$vid");
								//echo "select * from catagory where video_id=$vid";
							while ($row_com=mysql_fetch_array($sql_sel_com)) {
								$user_id=$row_com['uid'];
								$sql_sel_user=mysql_query("SELECT * FROM `user` WHERE `uid`=$user_id");
								//echo "SELECT * FROM `user` WHERE `uid`=$user_id";
								$row_user=mysql_fetch_array($sql_sel_user);
								$unm=$row_user['uname'];
								//echo $row_user['uname'];
							?>
								<div class="comments">
								<div class="commentor">
									<h3><?php echo $unm?></h3>		
								</div>
								<div class="comment">
									<p><?php echo $row_com['comment'];?></p>
								</div>
							</div>
						<?php
							}
						?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="col-sm-4" style="background-color:white; margin-top:1%;width:31%;">
	<?php 
		$cat_id=$arr_video['cid'];
		$res_video=mysql_query("select * from video where cid=$cat_id");

		
		for ($i=0; $i <5 ; $i++) { 
			$arr_vid=mysql_fetch_array($res_video);		
			
	?>

		<div class="row" >
			<div class="col-md-6">
				<a href="sivay.php?id=<?php echo $arr_vid['id']?>"><img src="<?php echo $arr_vid['img'];?>"></a>
			</div>
			<div class="col-md-6">
				<a href="sivay.php?id=<?php echo $arr_vid['id']?>"><h5 style="margin-left:20%"><?php echo $arr_vid['name'];?></h5></a>
			</div>
		</div>
		<?php
	}
	?>
	</div>
	

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$(".p").hide();
		$("#btn-desc").click(function (){
			$(".p").slideToggle();
		});
		$(".like").click(function(){
			var v_id = $(this).attr("name");
			var id=$(this).attr("id");
			var uid=<?php echo $uid;?>;
			var status;
			if (id=="like") {
				status = "like";
			}
			else{
				status = "unlike";	
			}
			
			$.ajax({
				url: 'like_unlike_proc.php',
				type : 'POST',
				data : {
					'v_id' : v_id,
					'status' : status,
					'uid' : uid
				},
				success : function(data){
					location.reload();
				}
			});
		});
	});
</script>
</body>
</html>
