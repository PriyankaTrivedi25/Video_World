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
$cat=$row['cid'];
$title=$row['name'];
$dec=$row['Description'];
echo $dec;
$sql_sel_cat=mysql_query("select * from catagory where cid=$cat");
//echo "select * from catagory where cid=$cat";
$row_cat=mysql_fetch_array($sql_sel_cat);
$cat1=$row_cat['name'];
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
									<hr/>
									<div class="col-sm-10" style="background-color: #fff;padding: 20px 0; margin-top: 10px;">
	
		<div class="upload-form ibox-content" style="padding: 20px;">
			<form enctype="multipart/form-data" action="<?php if(isset($_GET['id'])){echo 'update.php';}else {echo 'addvideo.php';}?>" method="POST"> 
				<input type="hidden" value="<?php echo $vid;?>" name="vid">
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px;">Choose Video:</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="file" id="fileUpload" required>
					</div>
				</div>
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px; ">Title:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" value="<?php if(isset($_GET['id'])){echo $title;}?>" required>
					</div>
				</div>
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px; ">Description:</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="desc" value="<?php if(isset($_GET['id'])){echo $dec;}?>" required></textarea>
					</div>
				</div>
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px;" required>Video image:</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="file1" id="fileUpload">
					</div>
				</div>
				
				<div class="row" style="margin:10px 0px;">
					<label class="col-sm-2 control-label" style="margin-top:10px; ">Category:</label>
					<div class="col-sm-10">
						<select class="form-control" name="cat">
						<option><?php if(isset($_GET['id'])) { echo $cat1; }?></option>
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
						<input type="submit" value="<?php if(isset($_GET['id'])){echo "Update";}else{echo "Upload";}?>"  name="<?php if(isset($_GET['id'])){echo "update";}else{echo "Upload";}?>" />
						
					</div>
				</div>
				<div class="song-body row" style="margin-right:0px;">
		
					</div>
			</form>
		</div>
	</div>

	
					
						
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
</script><?php
}
?>
</html>