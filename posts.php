<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.image{
			border: 1px solid lightgray;
			background-color: white;
			width: 800px;
			margin-bottom: 100px;
			padding-bottom: 35px;
			margin-left: 200px;
			box-sizing: border-box; 

		}
		.image1 li {
			list-style-type:none;
			text-decoration:none;
			padding-top:10px;
			padding-bottom:0.5px;
			padding-left:5px;
			padding-right:5px;
		}
		.likes li{
			list-style-type: none;
			text-decoration: none;
		}
		.likes1 li{
			list-style-type: none;
			text-decoration: none;
			margin-left: 10px;
			float: left;
		}
	</style>
</head>
<body>
	<?php
		mysql_connect("localhost","root","") or die ("mysql() error");
		mysql_select_db("first");
		$display=mysql_query("SELECT * FROM `images` ORDER BY `id` desc");
		while($image=mysql_fetch_array($display)){
			$path=$image["location"];
			$name=$image["imagename"];
			$up=$image["uploader"];
			$id=$image["id"];
			$lik=$image["likes"];
			echo "<div class='image'> 
					<div class='image1'>
						<ul>
							<li>Posted  by $up</li>
							<li><img src='$path$name' height='500' width='700'></li>
						</ul>
					</div>
					<div class='likes'>
						<ul>
							<li><button onclick='like(\"$id\",\"$name\"); refresh(\"$id\");'>Like</button></li>
						</ul>
					</div>
					<div class='likes1'>
						<ul>
							<li><img src='like.png' width='25' height='25'></li>
							<li><div id='nik'>$lik</div></li>
						</ul>	
					</div>
			</div>";
		}
	?>
</body>
</html>
