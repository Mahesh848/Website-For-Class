<!DOCTYPE html>
<html>
<head>
	<title>hfs</title>
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
		.signout{
			margin-top: -50px;
			margin-left: 1200px;
		}
		.signout input[type=submit]{
			padding: 5px;
		}
		.filename{
			margin-left: 100px;
			margin-top: 50px;
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
		.filename{
			margin-bottom: 0px;
			margin-left: 10px;
			overflow: hidden;
		}
		.filename a{
			margin-left: 10px;
			margin-top:10px;
			overflow: hidden;
		}
		h2{
			margin-left: 25px;
			background-color: white;
			width: 260px;
			padding-left: 10px;
		}
		.fil{
			margin-top: 50px;
			margin-left: 10px;
		}
		.fil label{
			font-size: 30px;
		}
		.fil input[type=file]{
			margin-bottom: 20px;
		}
		.fil input[type=submit]{
			margin-left: 100px;
			padding: 7px;
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
			<li><a href="logout.php" style="float: right; margin-right: 5px;">Logout</a></li>
		</ul>
	</div>
	<h2> DOWNLOAD HERE</h2>
		<?php
			echo "<div class='filename'>";
				$fol = opendir("download");
				$i=0;
				while(($rd = readdir($fol))!=null){
						if($rd!='.' && $rd!='..'){
								$i = 1;
								$filepath = "download/".$rd;
								echo "<a href='$filepath' download>$rd</a>";
								echo"<br/>";
						}
				}
				if($i==0){
					echo "<p>There is no files to download</p>";
				}
			echo "</div>";
		?>
		<h2> UPLOAD HERE</h2>
		<div class="fil">
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<label>Select your file:  </label>
				<input type="file" name="file">
				<input type="submit" name="upload" value="Upload">
			</form>
		</div>	
</body>
</html>