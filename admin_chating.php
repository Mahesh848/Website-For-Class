<!-- //d D -->
<!DOCTYPE html>
<html>
<?php
	session_start();
	if(!isset($_SESSION['name'])){
		header("Location:login.php");
	}
?>
<head>
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<title>chat</title>
	<style type="text/css" media="screen">
		body{
			font-family:Times,arial,Sans-serif;
			background-color:lightgrey;
		}
		.Navigation{
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
		.page ul{
			list-style: none;
		}
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
		#chating{
			overflow-y: scroll;
			height: 410px;
			display: none;
		}
		.send{
			margin-left:260px;
			float: bottom;
			display: none;
		}
		.send input[type=text]{
			padding:5px;
			width:95%;
			font-size:1.2em;		
		}
		#presentchat{
			text-align: center;
			font-size: 1.8em;
			height: 50px;
    		border: 1px solid lightgray;
    		box-sizing: border-box;
		}
		#friendslist{
			overflow-y: scroll;
			width: 240px;
			height: 410px;
		}
	</style>
</head>
<body onload="unread()">
	<div class="Navigation">
		<ul>
			<li><a href="admin.php" style="float: left;">Home</a></li>
			<li><a href="permisson.php" style="float: left;">GivePermissonToAttendance</a></li>
			<li><a href="admin_chating.php" style="float: left;">Chat</a>
			<li><a href="logout.php" style="float: right; margin-right: 5px;">Logout</a></li>
		</ul>
	</div>	
	<div id="presentchat">	</div>
	<hr>
	<div class="page">
		<ul>
			<li>
				<div id="friendslist" style="float: left;">
					
				</div>
			</li>
			<li>
				<div id="chating" style="margin-left: 300px;">
					
				</div>
				<div class="send" id="ses">
					<form onsubmit='send(message.value);return false;'>
						<input type="text" name="message" id="mess1" placeholder="Message........." required>
					</form>
				</div>
			</li>
		</ul>
	</div>
	<script type="text/javascript">
		var clicker;
		var flag=0;
		function loading(name,clic){
			document.getElementById("chating").style.display = "block";
			document.getElementById("ses").style.display = "block";
			clicker=clic;
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function() {
		    	if (this.readyState == 4 && this.status == 200) {	
		    		  document.getElementById("chating").innerHTML = this.responseText;
		    		  refresh_unread();
		    		  refresh(name);
		    	}
		  	};
		  	ajaxreq.open("GET","chat.php?click="+name,true);
		  	ajaxreq.send();
		}	
		function send(name){
			document.getElementById("mess1").value="";
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function(){
		    	if (this.readyState == 4 && this.status == 200){	
		    		  document.getElementById("show").innerHTML = this.responseText;
		    	}
		  	};
		  	ajaxreq.open("GET","send.php?message="+name+"&click="+clicker,true);
		  	ajaxreq.send();
		}	
		function printname(){
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function(){
		    	if (this.readyState == 4 && this.status == 200){	
		    		  document.getElementById("presentchat").innerHTML = this.responseText;
		    	}
		  	};
		  	ajaxreq.open("GET","presentchat.php?click="+clicker,true);
		  	ajaxreq.send();
		}
		function refresh(name){
			if(flag==0){
				flag = 1;
				refresh2(name);
			}
			else{
				flag = 0;
				refresh1(name);
			}
		}
		function refresh1(name){
			if(flag==0){
				setTimeout(function(){
		  			$('#chating').load("chat.php?click="+name);	
		  				refresh1(name);
		  			},200);
			}
			else{
				return false;
			}	
		}
		function refresh2(name){
			if(flag==1){
				setTimeout(function(){
		  			$('#chating').load("chat.php?click="+name);	
		  				refresh2(name);
		  			},200);
			}
			else{
				return false;

			}	
		}
		function unread(){
			var ajaxreq = new XMLHttpRequest();
			ajaxreq.onreadystatechange = function() {
		    	if (this.readyState == 4 && this.status == 200) {	
		    		  document.getElementById("friendslist").innerHTML = this.responseText;
		    	}
		  	};
		  	ajaxreq.open("GET","unread.php",true);
		  	ajaxreq.send();
		}
		function refresh_unread(){
			setTimeout(function(){
		  		$('#friendslist').load("unread.php");			
		  	},200);
		}
	</script>
</html>