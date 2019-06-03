<?php
session_start();
     /*  if(empty($_SESSION['admin']))
       header("location:login.php");
if(isset($_SESSION['admin']))
{ */
include("connection.php");
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
<section id="wrapper">
	<div class="row">
			<div class="col-sm-2 dashboard">
				<div class="row">
					<div class="col-sm-12">
						<img src="img/logo.png" class="img-responsive logo">
					</div>
					<nav class="col-sm-12">
						<ul>
							<li><a href="upload.php"> Upload Videos</a></li>
							<li><a href="byuser.php">By Users</a></li>
							<li><a href="maxlike.php">Maximum Like</a></li>
							<li id="dropdown"><a href="search.php">Search</a></li>
							<ul class="dropdown" style="display:none;">
						<?php
							$sql_cat=mysql_query("select * from catagory");
							while ($row_cat=mysql_fetch_array($sql_cat)) {
						?>
								<li><a href="search.php?cat=<?php echo $row_cat['cid']?>"><?php echo $row_cat['name']?></a></li>
						<?php
							}
						?>	
						
							</ul>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-sm-10 content">
				<div class="wrapper-top">
					<div class="row">
						<div class="col-sm-10">
							<div class="top-heading">
								<h3>Welcome to Admin Panel</h3>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="logout">
								<i class="fa fa-sign-out"></i><a href="logout.php">Log Out</a>
							</div>
						</div>
						<div class="col-sm-12 page-heading">
							<div class="page-heading-content">
								<h3>Videos</h3>
								<p>Home / <a href="#"> Videos </a></p>
							</div>
						</div>
						<div class="col-sm-12">
							
								<div class="ibox">
									<div class="ibox-heading">
										<h3>Videos</h3>
									</div>
									<hr />
						
									<div class="ibox-table">
										<table class="table table-hover">
											<tr>
												<th>Video id</th>
												<th>Video Name</th>
												<th>Video </th>
												<th>Video size</th>
												<th>Video type</th>
												<th>Catagory</th>
												<th>Edit</th>
												<th>Delete</th>
													</tr>
										<?php
											$cid=$_GET['cat'];
											$sql="select * from video where cid='$cid'";
											$data=mysql_query($sql);
											while ($arr=mysql_fetch_array($data)) {
											
										?>	
											<tr>
												<td><?php echo $arr[0];?></td>
												<td><?php echo $arr[1];?></td>
												<td><img src="<?php echo $arr['img'];?>" height="50" width="50" ></td>
												<td><?php echo $arr[4];?></td>
												<td><?php echo $arr[5];?></td>
										<?php
											$cat_id=$arr[6];
											$sql_cat="select * from catagory where cid=$cat_id";
											$data_cat=mysql_query($sql_cat);
											$arr_cat=mysql_fetch_array($data_cat); 
											
										?>
												<td><?php echo $arr_cat[1];?></td>
												<td><a href="upload.php?vid=<?php echo $arr[0];?>&id=12" name="update"><span class="fa fa-pencil" style="font-size: 27px;color: #737171;"></a></td>
												<td><a href="delete.php?vid=<?=$arr[0]?>"onclick="return confirm('Are you sure you want to delete?');"> <span class="fa fa-trash" style="font-size: 27px;color: #c01417;"></a></td>
												
											</tr>
								
											<?php
												}
										?>
										</table>
									</div>
								</div>
							
						</div>
					</div>
				</div>
			</div>
	</div>
</section>
</body>
<script src="js/jquery.js"></script>
<script>
	$("#dropdown").hover(function(){
		$(".dropdown").css("display","block");
		$("#dropdown").css("background-color","rgba(10,10,10,0.7)");
	});
	$(".dropdown").hover(function(){
		$(".dropdown").css("display","block");
	});
	$("#dropdown").mouseleave(function(){
		$(".dropdown").css("display","none");
	});
	$(".dropdown").mouseleave(function(){
		$(".dropdown").css("display","none");
	});
</script>
<?php
//}
?>
</html>