<?php
if (isset($_POST['file'])) {
	$file=$_POST['file_name'];


header("Content-type: audio/mp3");
header('Content-Disposition:attachment;filename=" '.$file.'"');
//allways a good idea to let the browser know how much data to expect
readfile('files/'.$file);
exit();
}
?>
<html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="download.php" method="POST" name="download">
		<input name="file_name" type="hidden" value="audio.mp3">
		<input type="submit" value="download">
			
		</form>
</body>
</html>
</html>