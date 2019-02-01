<!DOCTYPE html>
<html>
<head>
	<title>unread</title>
	<style type="text/css">
		button{
			border-radius: 8px;
			border:none;
		    color: black;
		    width: 200px;
		    padding: 5px;
		    text-align: center;
		    display: inline-block;
		    cursor: pointer;
		    margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<?php
		mysql_connect("localhost","root","");
		mysql_select_db("Bulli");
		session_start();
		$user = $_SESSION['name'];
		$table = mysql_query("SELECT * FROM Student_details");
		while($row = mysql_fetch_array($table)){
			$name = $row['name'];
			$uname = $row['uname'];
			$table1 = mysql_query("SELECT * FROM chating");
			$unread = 0;
			$reciever = $row['uname'];
			while($row1 = mysql_fetch_array($table1)){
				if($row1['sender']==$reciever && $row1['reciever']==$user && $row1['read']==0){
					$unread++;
				}
			}
			if($user!=$row['uname']){
	?>
			<div class='chats'>	
				<button type='button' value="<?php echo $uname ?>" onclick='loading("<?php echo $uname?>",this.value); printname(); setscroll();' ><?php echo $uname;?> </button><sup> <?php  if($unread) echo $unread; ?> </sup>
			</div>
	<?php
		}
	}
	?>
</body>
</html>
