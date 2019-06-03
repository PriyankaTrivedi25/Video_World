<?php
session_start();
       if(empty($_SESSION['admin']))
       header("location:login.php");
if(isset($_SESSION['admin']))
{
include("connection.php");
if(isset($_GET['id']))
{
    $vid=$_GET['vid'];
    $qu="select * from video where id='$vid'";
    //echo $qu;
    $res=mysql_query($qu);
    $row=mysql_fetch_array($res);
    echo $res;
$cat=$row['catagory'];
}

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
							<li><a href="#">By Users</a></li>
							<li><a href="#">Maximum Like</a></li>
							<li id="dropdown"><a href="search.php">Search</a></li>
							<ul class="dropdown" style="display:none;">
								<li><a href="search.php?cat=Bollywood">Bollywood</a></li>
								<li><a href="search.php?cat=News">News</a></li>
								<li><a href="search.php?cat=Sports">Sports</a></li>
								<li><a href="search.php?cat=Cartoon">Cartoon</a></li>
								
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
           			<div class="col-sm-12">
							
								<div class="ibox">
									<div class="ibox-heading">
										<h3>Videos</h3>
									</div>
									<hr />
					<form method="POST" action="addcat.php" enctype="multipart/form-data">
								
								<p style="padding-left:5px;font-size:20px;">Catagory Name:
								<input type="text" name="cname"><br><br>
								Catagory Image:<input type="file" name="file1"><br>
								Icon name:<input type="text" name="iname">
								<input type="submit" value="Add">
								</p>
									
									
					</form>
						
									<div class="ibox-table">
										<table class="table table-hover">
											<tr>
												<th>Catagory id</th>
												<th>Catagory Name</th>
												<th>Image</th>
												<th>Edit</th>											
											</tr>
										<?php
											$sql="select * from catagory";
											$data=mysql_query($sql);
											while ($arr=mysql_fetch_array($data)) {
											
										?>	
											<tr>
												<td><?php echo $arr[0];?></td>
												<td><?php echo $arr[1];?></td>
												<td><img src="<?php echo $arr[2];?>" height="50" width="50"></img></td>
												<td><a href="delcatagory.php?cid=<?=$arr[0]?>"onclick="return confirm('Are you sure you want to delete?');"> <span class="fa fa-trash" style="font-size: 27px;color: #c01417;"></a></td>
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
</script><?php
}
?>
</html>