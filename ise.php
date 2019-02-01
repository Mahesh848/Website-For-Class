<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location:login.php");
	}
?>
<head>
	<title>*****</title>
	<style type="text/css">
		.f1{
			margin-left: 500px;
			margin-top: 200px;
		}
		.f1 a{
			text-decoration: none;
			margin-left: 120px;
			display: block;
			padding: 15px;
			width: 20px;
		}
		.f1 a:hover{
			background-color: lightgray;
		}
		.f2{
			margin-left: 500px;
			margin-top: 200px;
		}
		.f2 a{
			text-decoration: none;
			margin-left: 90px;
			display: block;
			padding: 15px;
			width: 20px;
		}
		.f2 a:hover{
			background-color: lightgray;
		}
	</style>
</head>
<body>
	<?php
		$sub = fopen("subject.txt","r");
		$e = fscanf($sub,"%s\n");
		list($t) = $e;
		$type = $_POST['A'];
		if(!strcmp($t,$type)){
			mysql_connect("localhost","root","");
			mysql_select_db("Bulli");
			$f = fopen("newcolumn.txt","r");
			$add = 0;
			$e = fscanf($f,"%s\n");
			list($b) = $e;
			if(!strcmp("yes",$b)){
				$add = 1;
				fclose($f);
			}
			if($add==1){
				$f = fopen("newcolumn.txt","w");
				fprintf($f,"%s\n","no");
				fclose($f);
				$f = fopen("column.txt","r");
				$e = fscanf($f,"%s\n");
				list($t) = $e;
				$new_column = $t;
				mysql_query("ALTER TABLE new_ise ADD $new_column VARCHAR(10)") or die("error");
				$table1 = mysql_query("SELECT * FROM new_ise");
				while($row=mysql_fetch_array($table1)){
					$cig = $row['id'];
					mysql_query("UPDATE `new_ise` SET `$new_column` = 'A' WHERE `id`='$cig'") or die("loop");
				}
				$cust = $_SESSION['name'];
				$cid;
				$table = mysql_query("SELECT * FROM Student_details");
				while($row = mysql_fetch_array($table)){
					if($row['uname']==$cust){
						$cid = $row['cid'];
						break;
					}
				}
				mysql_query("UPDATE `new_ise` SET `$new_column` = 'P' WHERE `id`='$cid'") or die("error1");
				$date = date('Y-m-d');
				$poa = "P";
				mysql_query("INSERT INTO ISE(sid,dat,poa) VALUES('$cid','$date','$poa')") or die("insert error");
				echo "
						<div class='f1'>
						<h2>SUCCESSFULLY SUBMITTED</h2>
						<a href='attendance.php'>OK</a>
					</div>";
			}
			else{
				$f = fopen("column.txt","r");
				$e = fscanf($f,"%s\n");
				list($t) = $e;
				$new_column = $t;
				$cust = $_SESSION['name'];
				$cid;
				$table = mysql_query("SELECT * FROM Student_details");
				while($row = mysql_fetch_array($table)){
					if($row['uname']==$cust){
						$cid = $row['cid'];
						break;
					}
				}
				$resultset = mysql_query("SELECT `$new_column` FROM new_ise WHERE `id`='$cid'") or die("f***");
				while($y = mysql_fetch_array($resultset)){
					$mahesh = $y[$new_column];
				}
				if(!strcmp($mahesh,"P")){
					echo "
						<div class='f1'>
						<h2>ALREADY SUBMITTED</h2>
						<a href='attendance.php'>OK</a>
					</div>";
				}
				else{
					mysql_query("UPDATE `new_ise` SET `$new_column` = 'P' WHERE `id`='$cid'") or die("error2");
					$date = date('Y-m-d');
					$poa = "P";
					mysql_query("INSERT INTO ISE(sid,dat,poa) VALUES('$cid','$date','$poa')") or die("insert error");
					echo "
						<div class='f1'>
						<h2>SUCCESSFULLY SUBMITTED</h2>
						<a href='attendance.php'>OK</a>
						</div>";
				}
			}
		}
		else{
			echo "
			<div class='f2'>
				<h2>YOUR NOT PERMITTED</h2>
				<a href='attendance.php'>OK</a>
			</div>";
		}
	?>
</body>

</html>
