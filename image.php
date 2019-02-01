<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location:login.php");
	}
?>
<head>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.file{
			margin-left: 470px;
			margin-top: 200px;
		}
		input[type=file]{
			padding:10px;
		}
	</style>
</head>	
<body>
<div class="file">
	<form action="image_upload.php" method="post" enctype="multipart/form-data">
	    <input type="file" name="file" id="file">
	    <input type="submit" value="upload" name="submit">
	</form>
</div>
</body>
</html> 
