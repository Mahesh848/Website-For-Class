<!-- //d D -->
<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['name']) && $_SESSION['name']=="bulli@admin"){
		header("Location:login.php");
	}
?>
<head>
	<title>admin</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		header{
			background-color:#3333a5;
		}
		header ul{
			list-style: none;
			overflow: hidden;
		}
		header li{
			float: left;
		}
		.Navigation{
			margin-top: -15px;
			background-color: #4d94ff;
		}
		.Navigation ul{
			list-style: none;
			overflow: hidden;
		}
		.Navigation li{
			margin-left: 10px;
		}
		.Navigation li a{
			text-decoration: none;
			color: black;
			padding: 10px;
			display: block;
		}
		.Navigation li a:hover{
			background-color: lightgray; 
		}
		.notice{
			margin-left: 350px;
			margin-top: 100px;
		}
		textarea{
			width: 50%;
			height: 50%;
			padding:10px;
		}
		input[type=submit]{
			padding: 5px; 
			margin-left: 220px;
		}
	</style>
</head>
<body>
	<header>
		<ul>
			<li><h1>ADMIN OPTIONS</h1></li>
		</ul>	
	</header>
	<div class="Navigation">
		<ul>
			<li><a href="admin.php" style="float: left;">Home</a></li>	
			<li><a href="permisson.php" style="float: left;">GivePermissonToAttendance</a></li>	
			<li><a href="admin_chating.php" style="float: left;">Chat</a>
			<li><a href="logout.php" style="float: right; margin-right: 5px;">Logout</a></li>
		</ul>
	</div>
	<div class="notice">
		<form action="" method="post">
			<textarea name="notice" placeholder="Notice here......."></textarea><br/>
			<input type="submit" name="submit" value="Submit">
		</form>	
	</div>
</body>	
	<?php
		if(isset($_POST['submit'])){
			$note = $_POST['notice'];
			$fp = fopen("notice.txt","w");
			fprintf($fp,"%s",$note);
			fclose($fp);
		}
	?>
</html>