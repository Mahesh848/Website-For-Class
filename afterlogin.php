<!-- //d D -->
<!DOCTYPE html>
<html>
<head>
	<title>Userpage</title>
	<style type="text/css" media = "screen">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		header{
			background-color:#3333a5;
		}
		header ul{
			list-style: none;
			overflow: hidden;
		}
		header li{
			float: left;
		}
		.Navigation{
			margin-top: -15px;
			background-color: #4d94ff;
		}
		.Navigation ul{
			list-style: none;
			overflow: hidden;
		}
		.Navigation li{
			margin-left: 10px;
		}
		.Navigation li a{
			text-decoration: none;
			color: black;
			padding: 10px;
			display: block;
		}
		.Navigation li a:hover{
			background-color: lightgray; 
		}
		
	</style>
</head>
<body onload="refresh()">
	<header>
			<ul>
				<li><h1>WElCOME TO OUR CLASS</h1></li>
			</ul>
	</header>
	<div class="Navigation">
		<ul>
			<li><a href="afterlogin.php" style="float: left;">Home</a></li>
			<li><a href="attendance.php" style="float: left;">Attendance</a></li>
			<li><a href="hfs.php" style="float: left;">HFS</a></li>
			<li><a href="chating.php" style="float: left;">Chat</a>
			<li><a href="image.php" style="float: left;">Create a post</a></li>
			<li><a href="aboutus.php" style="float: left;">About us</a></li>
			<li><a href="logout.php" style="float: right; margin-right: 5px;">Logout</a></li>
		</ul>
	</div>
	<div id="posts">
		
	</div>
</body>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		function like(id,name){	
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function() {
		    	if (this.readyState == 4 && this.status == 200) {	
		    		  document.getElementById("nik").innerHTML = this.responseText; 
		    	}
	  		};
	  		ajaxreq.open("GET","like.php?id="+id,true);
	  		ajaxreq.send();
	   }	
	   function refresh(){		
	  		setTimeout(function(){
	  			$('#posts').load("posts.php");
	  			},200);
	   }
	</script>
</html>