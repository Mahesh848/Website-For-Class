<!DOCTYPE html>
<html>
<head>
	<title>Aboutus</title>
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
		.ra_g{
			margin-left: 550px;
			margin-top: 50px;
		}
		input[type=submit]{
			margin-left: 550px;
			margin-top: 20px;
			padding: 10px;
		}
		input[type=text]{
			padding: 10px;
			margin-left: 150px;
			width: 70%;
		}
	</style>
</head>
<body>
	<header>
			<ul>
				<li><h1>WElCOME TO OUR CLASS</h1></li>
			</ul>
	</header>
	<div class="Navigation">
		<ul>
			<li><a href="afterlogin.php" style="float: left;">Home</a></li>
			<li><a href="attendance.php" style="float: left;">Attendance</a></li>
			<li><a href="hfs.php" style="float: left;">HFS</a></li>
			<li><a href="chating.php" style="float: left;">Chat</a>
			<li><a href="image.php" style="float: left;">Create a post</a></li>
			<li><a href="aboutus.php" style="float: left;">About us</a></li>
			<li><a href="logout.php" style="float: right; margin-right: 5px;">Logout</a></li>
		</ul>
	</div>
	<div class="ra_g">
		<p>E-2 CSE SECTION-A TEAM</p>
	</div>
	<div class="feedback">
		<form action="" method="post">
			<input type="text" name="feedback" placeholder="Feedback........................"><br/>
			<input type="submit" name="submit" value="send">
		</form>
	</div>
</body>
	<?php
		if(isset($_POST['submit'])){
			mysql_connect("localhost","root","");
			mysql_select_db("Bulli");
			session_start();
			$user = $_SESSION['name'];
			$f = $_POST['feedback'];
			mysql_query("INSERT INTO `feedback` (`sender`, `feed`) VALUES ('$user', '$f')") or die("error..");
		}
	?>
</html>