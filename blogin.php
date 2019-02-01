<?php
	mysql_connect("localhost","root","") or die("error");
	mysql_select_db("Bulli");
	if(isset($_POST['uname']) && isset($_POST['password'])){
		$user = $_POST['uname'];
		$pass = $_POST['password'];
		$table = mysql_query("SELECT * FROM Student_details");
		if($user=="bulli@admin" && $pass == "ctforces"){
			session_start();
			$_SESSION['name']=$user;
			// echo $_SESSION['name'];
			header("Location:admin.php");
		}
		else{
			$match = 0;
			while($value = mysql_fetch_array($table)){
				if($value['uname']==$user && $value['password']==$pass){
					$match = 1;
					session_start();
					$_SESSION['name']=$user;
					header("Location:afterlogin.php");
				}
			}
			if($match==0){
				header("Location:login.php");
			}
		}	
	}
?>