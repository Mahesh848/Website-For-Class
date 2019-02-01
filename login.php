<!-- //d D -->
<!DOCTYPE html>
<html>
	<head>
		<title>Class</title>
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
				overflow: hidden;
			}
			.login{
				margin-left: 250px;
				margin-top: 50px;
			}
			.login input{
				border-radius: 0px;
				padding-left: 10px;
			}
			.bodi ul{
				list-style: none;
				overflow: hidden;
			}
			.sign{
				margin-left: 200px;
			}
			.bodi li{
				float: left;
			}
			.sign h2{
				margin-left: 70px;
			}
			.signup input[type=text]{
				width:100%;
				padding:10px;
				margin-bottom:6px;
				margin-left:10px;
			}
			.signup input[type=password]{
				width:100%;
				padding:10px;
				margin-bottom:6px;
				margin-left:10px;
			}
			.signup input[type=date]{
				width:100%;
				padding:10px;
				margin-bottom:6px;
				margin-left:10px;
			}
			.signup input[type=submit]{
				margin-left:100px;
				width:50%;
				padding:10px;
				margin-bottom:3px;
			}
			.notice{
				border: 1px solid lightgrey;
				height: 450px;
				width: 500px;
				padding-top: 10px;
				margin-right: 200px;
				overflow: hidden;
				box-sizing: border-box;
			}
			.notice h2{
				color: red;
				margin-left: 90px;
			}
			.hint{
				margin-left: 870px;
				margin-top: -20px;
				font-size: 25px;
				color: red;
			}
			.notice p{
				font-size: 25px;
				font-style: bold;
			}
		</style>
	</head>
	<body>
		<header>
			<ul>
				<li><h1>WElCOME TO OUR CLASS</h1></li>
				<li>
					<div class = "login">
						<form action="blogin.php" method="post" >
							<input type = "text" name="uname" placeholder="Enter your username">
							<input type="password" name="password" placeholder="Enter your password">
							<input type="submit" name="submit" value="Login">
						</form>	
					</div>
				</li>
			</ul>
		</header>
		<div class="bodi">
			<ul>
				<li>
					<div class="notice">
						<h2>Notice Board</h2>
						<?php
							$fp = fopen("notice.txt","r");
							while(($line = fgets($fp))!=false){
								echo "<p>$line</p>";
							}
						?>
					</div>
				</li>
				<li>
					<div class="sign">
						<h2>Signup Here</h2>
						<div class="signup">
							<form action="" method="post">
								<input type="text" name="cid" placeholder="Enter your college id " required><br/>
								<input type="text" name="name" placeholder="Enter your name" required><br/>
								<input type="date" name="dob" placeholder="Enter your date of birth y-m-d" required><br/>
								<input type="text" name="uname" placeholder="Enter username" required><br/>
								<input type="password" name="password" placeholder="Enter password" required><br/>
								<input type="submit" name="submit" value="signup">
							</form>
						</div>
					</div>	
				</li>	
			</ul>
		</div>
		<div class="hint">
			<?php
				mysql_connect("localhost","root","") or die("error");
				mysql_select_db("Bulli");
				$table = mysql_query("SELECT * FROM Student_details");
				if(isset($_POST['uname'])){
					$match = 1;
					$id = $_POST['cid'];
					$n = $_POST['name'];
					$d = $_POST['dob'];
					$u = $_POST['uname'];
					$p = $_POST['password'];
					while ($value = mysql_fetch_array($table)){
						if($u==$value['uname']){
							$match = 0;
							echo "Username is already exits";
							echo "<br/>";
						}
						if($id==$value['cid']){
							$match = 0;
							echo "ID is already exits";
							echo "<br/>";
						}
					}
					if($match==1){
						mysql_query("INSERT INTO Student_details(cid,name,dob,uname,password) VALUES('$id','$n','$d','$u','$p')");
					}
				}
			?>
		</div>	
	</body>
</html>