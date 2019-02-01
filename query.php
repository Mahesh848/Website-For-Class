<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location:login.php");
	}
?>
<head>
	<title>query</title>
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
			margin-top: 50px;
			margin-left: 760px;
		}
		.signout input[type=submit]{
			padding: 10px;
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
			float: left;
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
		.sender{
			margin-left:740px;
			background-color:white;
			border-radius:20px;
			padding-left:10px;
			width:20%;
			overflow:hidden;
		}
		.reciever{
			margin-left: 10px;
			background-color:white;
			border-radius:20px;
			padding-left:10px;
			width:20%;
			overflow:hidden;
		}
		.send{
			margin-left:400px;
			margin-top:50px;
		}
		.send input{
			padding:10px;
			width:100%;
			margin-left: -200px;
			font-size:1.2em;		
		}
	</style>
</head>
<body>
	<header>
			<ul>
				<li><h1>WElCOME TO OUR CLASS</h1></li>
				<li>
					<div class = "signout">
						<form action="logout.php" method="post" >
							<input type="submit" name="submit" value="Logout">
						</form>	
					</div>
				</li>
			</ul>
	</header>
	
	<div class="Navigation">
		<ul>
			<li><a href="afterlogin.php">Home</a></li>
			<li><a href="attendance.php">Attendance</a></li>
			<li><a href="hfs.php">HFS</a></li>
			<li><a href="query.php">Contact us</a></li>
		</ul>
	</div>
	<div class="line">
		
	</div>
	<?php
		mysql_connect("localhost","root","") or die("error");
		mysql_select_db("Bulli");
		if(isset($_POST['message'])){
			$s = $_SESSION['name'];
			$r = "bulli@admin";
			$m = $_POST['message'];
			$read = 0;
			mysql_query("INSERT INTO chating(`sender`,`reciever`,`message`,`read`) VALUES('$s','$r','$m','$read')");
		}
		$s = $_SESSION['name'];
		$r = "bulli@admin";
		$table = mysql_query("SELECT * FROM chating");
		while($row = mysql_fetch_array($table)){
			if($row['sender']==$s && $row['reciever']==$r){
				$mes = $row['message'];
				echo "<div class='sender'>$mes</div>";
				echo "<br/>";
			}
			if($row['sender']==$r && $row['reciever']==$s){
				$mes = $row['message'];
				echo "<div class='reciever'>$mes</div>";
				echo "<br/>";
			}
		}
	?>
	<div class="send">
		<form action="" method="post">
			<input type="text" name="message" placeholder="Any Query........." required> <br/>
		</form>
	</div>
</body>
	
</html>