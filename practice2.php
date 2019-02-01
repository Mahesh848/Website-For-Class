<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("Bulli");
	$a="abcg";
	if(mysql_query("ALTER TABLE CN ADD $a VARCHAR( 255 )")){
		echo "sucess";
	}
	else{
		echo "error";
	}
?>