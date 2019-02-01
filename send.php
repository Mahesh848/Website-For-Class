<?php
	mysql_connect("localhost","root","");
	mysql_select_db("Bulli");
	$message = $_GET['message'];
	$rec = $_GET['click'];
	session_start();
	$sen = $_SESSION['name'];
	$read = 0;
	if(mysql_query("INSERT INTO chating(`sender`,`reciever`,`message`,`read`) VALUES('$sen','$rec','$message','$read')")){
	}
	else{
		
	}

?>