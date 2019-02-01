<?php
	mysql_connect("localhost","root","");
	mysql_select_db("Bulli");
	$table = mysql_query("SELECT * FROM new_ai");
	while($row = mysql_fetch_array($table)){
		$i = $row['id'];
		mysql_query("INSERT INTO new_cc(id) VALUES('$i')");
	}
?>