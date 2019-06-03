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
                      <!-- <?php if($nik==0)
                        { ?>
						<div class="col-sm-12 page-heading">
							<div class="page-heading-content">
								<h3>Videos</h3>
								<p>Home / <a href="#"> Videos </a></p>
							</div>
						</div>
		<?php } ?>-->
						<div class="col-sm-12">
							
								<div class="ibox">
									<div class="ibox-heading">
										<h3>Videos</h3>
									</div>
									<hr />
					<form method="POST" action="<?php if(isset($_GET['id'])){echo 'update.php';}else {echo 'add.php';}?>" enctype="multipart/form-data">
								
								<p style="padding-left:5px;font-size:20px;">Catagory:  <select  name="cat" style="width:100px;font-size:16px;">
                        <option><?php if(isset($_GET['id'])) { echo $cat; }?></option>
							<option>Cartoon</option>
							<option>Sports</option>
							<option>Bollywood</option>
						</select></p>
						<?php if(isset($_GET['id']))
							{

								?>
								<input type="hidden" name="vid" value="<?php echo $row['id'];?>">
								Name:<input type="text" name="nm" value="<?php echo $row['name'];?>">

					  <?php } ?>
									<h4 style="padding-left:5px; padding-top:5px;"> Select a Video : </h4>
									<input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
									<input type="file" name="file" id="file"/><br>
									<input type="submit" value="<?php if(isset($_GET['id'])){echo "Update";}else{echo "Upload";}?>"  name="<?php if(isset($_GET['id'])){echo "update";}else{echo "Upload";}?>" />

									
					</form>
						
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
											$sql="select * from video";
											$data=mysql_query($sql);
											while ($arr=mysql_fetch_array($data)) {
											
										?>	
											<tr>
												<td><?php echo $arr[0];?></td>
												<td><?php echo $arr[1];?></td>
												<td><video src="<?php echo $arr[2];?>" height="50" width="50" controls></video></td>
												<td><?php echo $arr[3];?></td>
												<td><?php echo $arr[4];?></td>
												<td><?php echo $arr[5];?></td>
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
</script><?php
}
?>
</html>