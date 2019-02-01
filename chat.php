<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location:login.php");
	}
?>
<head>
	<title>chat</title>
	<style type="text/css">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
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
			margin-left: 200px;
			background-color:white;
			border-radius:20px;
			padding-left:10px;
			width:20%;
			overflow:hidden;
		}
	</style>
</head>
<body>
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("Bulli");
	$sen = $_SESSION['name'];
	$rec = $_GET['click'];
	$usen = "";
	$table1 = mysql_query("SELECT * FROM Student_details");
	while($row = mysql_fetch_array($table1)){
		if($row['uname']==$sen){
			$usen = $row['uname'];
			break;
		}
	}
	if(isset($_POST['message'])){
		$s = $usen;
		$r = $rec;
		$m = $_POST['message'];
		$read = 0;
		mysql_query("INSERT INTO chating(`sender`,`reciever`,`message`,`read`) VALUES('$s','$r','$m','$read')") or die("error...");
	}
	$table = mysql_query("SELECT * FROM chating");
	while($r = mysql_fetch_array($table)){
		if($usen==$r['sender'] && $rec==$r['reciever']){
			$mes = $r['message'];
			echo "<div class='sender'>$mes</div>";
			echo "<br/>";
		}
		if($usen==$r['reciever'] && $rec==$r['sender']){
			if($r['read']==0){
				$id = $r['id'];
				mysql_query("UPDATE `chating` SET `read`='1' WHERE `chating`.`id`='$id'") or die("fucking........");
			}
			$mes = $r['message'];
			echo "<div class='reciever'>$mes</div>";
			echo "<br/>";
		}

	}

?>
</body>
</html>
