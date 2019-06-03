<?php
session_start();
       if(empty($_SESSION['admin']))
       header("location:login.php");
if(isset($_SESSION['admin']))
{
include("connection1.php");
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
							
							<li><a href="upload.php">Home</a></li>
							<li><a href="byuser.php">Rector</a></li>
							<li><a href="maxlike.php">Warden</a></li>
							<li><a href="maxlike.php">Request</a></li>
							<li><a href="maxlike.php">order</a></li>
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
										<h3>List of all rectors</h3>
									</div>
									<hr/>
									<div class="col-sm-10" style="background-color: #fff;padding: 20px 0; margin-top: 10px;">
	
		<div class="upload-form ibox-content" style="padding: 20px;">
			
		</div>
	</div>

	
					
						
									<div class="ibox-table">
										<table class="table table-hover">
											<tr>
												<th>Name</th>
												<th>Email id</th>
												<th>Photo</th>
												<th>Adress</th>
												<th>Birth Date</th>
												<th>Contact no</th>
												<th>Qualification</th>
												<th>Catagory</th>
																							
											</tr>
										<?php
											$sql="select * from rector";
											$data=mysql_query($sql);
											while ($arr=mysql_fetch_array($data)) {
											
										?>	
											<tr>
												<td><?php echo $arr[1];?></td>
												<td><?php echo $arr[3];?></td>
												<td><img src="<?php echo $arr[5];?>" height="50" width="50" ></td>
												<td><?php echo $arr[2];?></td>
												<td><?php echo $arr[7];?></td>
												<td><?php echo $arr[4];?></td>
												<td><?php echo $arr[6];?></td>
												<td><?php echo $arr[8];?></td>
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