<?php
session_start();
       if(empty($_SESSION['admin']))
       header("location:login.php");
if(isset($_SESSION['admin']))
{
include("connection.php");
$sql="select * from video";
$data=mysql_query($sql);	
$sql_cat=mysql_query("select * from catagory");					
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
	.hover-a a:hover{
	background-color:rgba(10, 10, 10, 0.7);
	}
	</style>
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

							<li class="hover-a"><a href="upload.php"> Upload Videos</a></li>
							<li class="hover-a"><a href="byuser.php">By Users</a></li>
							<li class="hover-a"><a href="maxlike.php">Maximum Like</a></li>
							<li id="dropdown"><a href="search.php">Search</a></li>
							<ul class="dropdown" style="display:none;">
						<?php
							while ($row_cat=mysql_fetch_array($sql_cat)) {
						?>
								<li><a href="search.php?cat=<?php echo $row_cat['cid']?>"><?php echo $row_cat['name']?></a></li>
						<?php
							}
						?>	
								
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-sm-10">
		
		<img src="<?php echo $arr2['img'];?>" style="margin-top: 1%;">

		<div class="clearfix"></div>
		
		<div class="song-body row" style="margin-right:0px;">
			<div class="col-sm-12">
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
}?>

</html>