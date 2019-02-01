<!DOCTYPE html>
<html>
<head>
	<title>hfs</title>
</head>
<body>
</body>
<?php
	if(isset($_POST['upload'])){
		$file_name = $_FILES['file']['name'];
		$file_tem_loc = $_FILES['file']['tmp_name'];
		$file_storage = "uploads/".$file_name;
		move_uploaded_file($file_tem_loc, $file_storage);	
		header("Location:hfs.php");
	}
?>
</html>