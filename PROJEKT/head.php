<!DOCTYPE html>
<html>
	<head>
		
		<title>LENNUMAA</title>
		<meta charset="UTF-8"/>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
		
		<script type="text/javascript" src="Pildid/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="Pildid/js/jquery.cycle2.min.js"></script>
		
		<meta name="viewport" content="width=device-width, inital-scale=1.0">
		
	</head>
	<body>
		<div id="wrapper">
			<div class="menu">
				<ul id="menu_reg">
					<li><img src="http://enos.itcollege.ee/~kmiller/vorgurakendused/Lennumaa/Pildid/LM_logov.jpg" alt="Logo" style= "width:110px;height:35px;"></li>
					<li><a class="active" href="?page=main">LENNUMAA</a></li>
					<li><a href="?page=events">Üritused</a></li>
					<li><a href="?page=gallery">Galerii</a></li>
					<li><a href="?page=contact">Kontakt</a></li>
					<!--<li id="menu_reg"><a href="?page=booking">Broneeri</a></li>-->
				</ul>
				
				<ul id="menu_diff">				
					<?php if(isset($_SESSION['loggedinuser'])): ?>
						<li><a href="?page=booking">Broneeri</a></li>
						<li><a href="?page=logout">Logi välja</a></li> 
						
					<?php else: ?>
						<li><a href="?page=registration">Registreeri</a></li> 
						<li><a href="?page=login">Logi sisse</a></li> 
					<?php endif; ?>	
				</ul>
					<div class="clearfix"></div>					
			</div>