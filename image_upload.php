<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location:login.php");
	}
?>
<head>
	<title>Status</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.not{
			margin-left: 500px;
			margin-top: 200px;
		}
	</style>
</head>
<body>

</body>
</html>
<?php
	if(isset($_FILES['file'])){
		$name=$_FILES['file']['name'];
		$temp_loc = $_FILES['file']['tmp_name'];
		$file_storage = "posts/".$name;
		$location="posts/";
		$ext=end((explode(".",$name)));
		if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			if(move_uploaded_file($temp_loc,$file_storage)){
				mysql_connect("localhost","root","") or die ("mysql() error");
				mysql_select_db("Bulli");
				session_start();
				$table = mysql_query("SELECT * FROM Student_details");
				$co = $_SESSION['name'];
				$combine = "";
				while($row=mysql_fetch_array($table)){
					if($row['uname']==$co){
						$combine = $row['name'];
						break;
					}
				}
				mysql_select_db("first");
				mysql_query("INSERT INTO images(imagename,location,uploader) VALUES('$name','$location','$combine')");
				echo "file uploaded";
				header("Location:afterlogin.php");
			}
			else{
				echo "<div class='not'>
						file not uploaded
						<a href='image.php'>OK</a>
				</div>";
			}
			
		}
		else{
			echo "Love you";
		}
	}
	else{
		echo "<div class='not'>
						<li>file not uploaded</li>
						<li><a href='image.php'>OK</a></li>
				</div>";
	}
?>
