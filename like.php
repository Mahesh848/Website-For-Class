<?php
	$chi=0;
	mysql_connect("localhost","root","");
	mysql_select_db("first");
	$checkr=mysql_query("SELECT * FROM likes");
	$like=$_GET['id'];
	session_start();
	$usri=$_SESSION['name'];
	while($che=mysql_fetch_array($checkr)){
		if($che['imageid']==$like && $che['liker']==$usri){
			$chi=1;
			break;
		}
	}
	if($chi==0){
		mysql_query("INSERT INTO likes(imageid,liker) VALUES('$like','$usri')");
		$query=mysql_query("SELECT * FROM images WHERE id='$like' ");
		while($row=mysql_fetch_assoc($query)){
			$likes=$row['likes'];
		}
		$likes++;
		echo $likes;
		mysql_query("UPDATE `images` SET `likes` = '$likes' WHERE `images`.`id` = '$like'");
	}
	else{
		$query  = mysql_query("SELECT * FROM images WHERE id='$like'");
		while($row=mysql_fetch_assoc($query)){
			$likes=$row['likes'];
		}
		echo $likes;
	}
?>
