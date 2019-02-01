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
	<style type="text/css" media="screen">
		body{
			background: lightgray;
		}
		table{
			margin-left: 500px;
		}
		h1{
			margin-left: 500px;
		}
		table,th,td{
			  border: 1px solid black;
    		  border-collapse: collapse;
    		  padding: 25px; 
		}
		.a{
			margin-top: 50px;
			margin-left: 580px;
			width: 40px;
		}
		.a a{
			text-decoration: none;
			display: block;
			padding: 10px;
		}
		.a a:hover{
			background-color: white;
		}
		.id{
			margin-left: 500px;
			font-size: 30px;
		}
	</style>
</head>
<body>
	<h1>Your ISE Attendance</h1>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Bulli");
		$table = mysql_query("SELECT * FROM Student_details");
		$user = $_SESSION['name'];
		$cid = "";
		while($row = mysql_fetch_array($table)){
			if($user == $row['uname']){
				$cid = $row['cid'];
				break;
			}
		}
		echo "<div class='id'>ID: ".$cid;
		echo "</div>";
		if($cid!=""){
			$details = array(array());
			$i=0;
			$table = mysql_query("SELECT * FROM ISE");
			echo "<table>";
					echo "<tr> 
						<th> DATE </th>
						<th> P/A </th>
					</tr>";
			while ($row = mysql_fetch_array($table)) {
				if($row['sid']==$cid){	
					echo "<tr>";
						echo "<td>";
						echo $row['dat'];
						echo "</td>";

						echo "<td>";
						echo $row['poa'];
						echo "</td>";
					echo "</tr>";
				}	
			}
			echo "</table>";

			
		}		
	?>
	<div class="a">
		<a href="attendance.php"> OK </a>
	</div>
</body>
	
</html>
