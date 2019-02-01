<!-- //d D -->
<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location:login.php");
	}
?>
<head>
	<title>Attendance</title>
	<style type="text/css" media="screen">
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
			color: black;
			text-decoration: none;
			padding: 10px;
			display: block;
		}
		.Navigation li a:hover{
			background-color: lightgray; 
		}
		.subjects{
			margin-top: 50px;
			margin-left: -40px;
		}
		.subjects ul{
			list-style: none;
			width: 200px;
		}
		.subjects li a{
			text-decoration: none;
			display: block;
			color: black;
			background-color: lightgray; 
			margin-bottom: 10px;
			padding: 10px;
		}
		.subjects li a:hover{
			background-color: white;
		}
		.bodi ul{
			list-style: none;
		}
		.bodi li{
			float: left;
		}
		.cn{
			margin-left: 200px;
			margin-top: 70px;
			display: none;
		}
		.cn input[type=radio]{
			margin-right: 20px;
		}
		.cn input[type=submit]{
			margin-left: 70px;
			margin-top: 20px;
			padding: 6px;
		}
		.cn a{
			margin-top: 10px;
			text-decoration: none;
			display: block;
			margin-left: 10px;
		}
		.mad{
			margin-left: 200px;
			margin-top: 70px;
			display: none;
		}
		.mad input[type=radio]{
			margin-right: 20px;
		}
		.mad input[type=submit]{
			margin-left: 70px;
			margin-top: 20px;
			padding: 6px;
		}
		.mad a{
			margin-top: 10px;
			text-decoration: none;
			display: block;
			margin-left: 10px;
		}
		.cc{
			margin-left: 200px;
			margin-top: 70px;
			display: none;
		}
		.cc input[type=radio]{
			margin-right: 20px;
		}
		.cc input[type=submit]{
			margin-left: 70px;
			margin-top: 20px;
			padding: 6px;
		}
		.cc a{
			margin-top: 10px;
			text-decoration: none;
			display: block;
			margin-left: 10px;
		}
		.ai{
			margin-left: 200px;
			margin-top: 70px;
			display: none;
		}
		.ai input[type=radio]{
			margin-right: 20px;
		}
		.ai input[type=submit]{
			margin-left: 70px;
			margin-top: 20px;
			padding: 6px;
		}
		.ai a{
			margin-top: 10px;
			text-decoration: none;
			display: block;
			margin-left: 10px;
		}
		.ise{
			margin-left: 200px;
			margin-top: 70px;
			display: none;
		}
		.ise input[type=radio]{
			margin-right: 20px;
		}
		.ise input[type=submit]{
			margin-left: 70px;
			margin-top: 20px;
			padding: 6px;
		}
		.ise a{
			margin-top: 10px;
			text-decoration: none;
			display: block;
			margin-left: 10px;
		}
	</style>
</head>
<body>
	<script type="text/javascript">
		function s1(){
			document.getElementById('1').style.display="block";
			document.getElementById('2').style.display="none";
			document.getElementById('3').style.display="none";
			document.getElementById('4').style.display="none";
			document.getElementById('5').style.display="none";
		}
		function s2(){
			document.getElementById('2').style.display="block";
			document.getElementById('1').style.display="none";
			document.getElementById('3').style.display="none";
			document.getElementById('4').style.display="none";
			document.getElementById('5').style.display="none";
		}
		function s3(){
			document.getElementById('1').style.display="none";
			document.getElementById('2').style.display="none";
			document.getElementById('3').style.display="block";
			document.getElementById('4').style.display="none";
			document.getElementById('5').style.display="none";
		}
		function s4(){
			document.getElementById('1').style.display="none";
			document.getElementById('2').style.display="none";
			document.getElementById('3').style.display="none";
			document.getElementById('4').style.display="block";
			document.getElementById('5').style.display="none";
		}
		function s5(){
			document.getElementById('1').style.display="none";
			document.getElementById('2').style.display="none";
			document.getElementById('3').style.display="none";
			document.getElementById('4').style.display="none";
			document.getElementById('5').style.display="block";
		}
	</script>
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
	<div class="bodi">
		<ul>
			<li>
				<div class="subjects">
					<ul>
						<li><a href="#" id="cn1" onclick="s1()">ComputerNetworks</a></li>
						<li><a href="#" id="mad1" onclick="s2()">MobileAppDevelopment</a></li>
						<li><a href="#" id="cc1" onclick="s3()">CloudComputing</a></li>
						<li><a href="#" id="ai1" onclick="s4()">ArtificialIntelligence</a></li>
						<li><a href="#" id="ise1" onclick="s5()">SoftWareEngineering</a></li>
					</ul>
				</div>
			</li>
			<li>	
				<div class="cn" id="1">
					<form action="cn.php" method="post">
						<input type="radio" name="A" value="cn" required>CN<br/>
						<input type="submit" name="submit" value="Submit">
					</form>
					<a href="view_cn.php">View Your Attendance</a>
				</div>
				<div class="mad" id="2">
					<form action="mad.php" method="post">
						<input type="radio" name="A" value="mad" required>MAD<br/>
						<input type="submit" name="submit" value="Submit">
					</form>
					<a href="view_mad.php">View Your Attendance</a>
				</div>
				<div class="cc" id="3">
					<form action="cc.php" method="post">
						<input type="radio" name="A" value="cc" required>CC<br/>
						<input type="submit" name="submit" value="Submit" >
					</form>
					<a href="view_cc.php">View Your Attendance</a>
				</div>
				<div class="ai" id="4">
					<form action="ai.php" method="post">
						<input type="radio" name="A" value="ai" required>AI<br/>
						<input type="submit" name="submit" value="Submit">
					</form>
					<a href="view_ai.php">View Your Attendance</a>
				</div>
				<div class="ise" id="5">
					<form action="ise.php" method="post">
						<input type="radio" name="A" value="ise" required>ISE<br/>
						<input type="submit" name="submit" value="Submit">
					</form>
					<a href="view_ise.php">View Your Attendance</a>
				</div>
			</li>	
		</ul>		
	</div>	
</body>
</html>