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
		.admin{
			margin-left: 450px;
			margin-top: 100px;
		}
		input[type=text]{
			padding: 5px;
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
			<li><a href="admin_chating.php" style="float: left;">Chat</a></li>
			<li><a href="logout.php" style="float: right; margin-right: 5px;">Logout</a></li>
		</ul>
	</div>
	<div class="admin">
		<form action="" method="post">
			<input type="radio" name="A" value="cn" required>CN<br/>
			<input type="radio" name="A" value="mad" required>MAD<br/>
			<input type="radio" name="A" value="ai" required>AI<br/>
			<input type="radio" name="A" value="ise" required>ISE<br/>
			<input type="radio" name="A" value="cc" required>CC<br/>
			<input type="text" name="column" placeholder="Enter column name" required> <br/>
			<input type="submit" name="submit" value="submit">
		</form>
	</div>
</body>	
	<?php
		if(isset($_POST['submit'])){
			$subject = $_POST['A'];
			$fp = fopen("subject.txt","w");
			fprintf($fp,"%s\n",$subject);
			fclose($fp);
			$column = $_POST['column'];
			$fp = fopen("column.txt","w");
			fprintf($fp,"%s\n",$column);
			fclose($fp);
			$fp = fopen("newcolumn.txt","w");
			fprintf($fp,"%s\n","yes");
			fclose($fp);
		}
	?>
</html>