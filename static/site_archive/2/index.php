<?php
		session_start();
		$_SESSION['animation'] = 1;
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<meta name="description" content="" />
		<meta name="generator" content="Studio 3 http://aptana.com/" />
		<meta name="author" content="Friend" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		
		<title>Nathan Friend</title>

		<link rel="stylesheet" type="text/css" href="template.css">
		
		<script type = "text/javascript" src = "jquery-1.6.2.min.js"></script>
		
		<script type="text/javascript">
			$(init);
			
			function init() {
				$("#enterimage").click(slideaway);
				$("#enterimage").hover(fader, antifader);								
			}
						
			function slideaway() {
				$("#container").animate( {
					"left": "100%"					
				}, 1000);
				var t = setTimeout('redirect()', 1000);				
			}
			
			function fader() {
				$("#enterimage").animate( {
					opacity: 0.0
				}, 200);
				$("#enterimage").css("cursor", "pointer");
				$("#enterimage").clearQueue();
			}
			
			function antifader() {
				$("#enterimage").animate( {
					opacity: 1.0
				}, 200);
				$("#enterimage").clearQueue();
				
			}
			
			function redirect() {
				window.location = "home.php";
			}
			
		</script>
		
	</head>

	<body>
		<div id="container">
			<div id="mainleftdiv">
				<img src="NATHAN.PNG" height = "660px" style="position: relative; float:right; top:50%; margin-top:-330px; margin-right: 10px;"></img>			
			</div>
			<div id="mainrightdiv">
				<img src="FRIEND.PNG" height = "660px" style="position: relative; top:50%; margin-top:-330px; margin-left: 10px;"></img>
				<img id="enterimageblurred" class="enterimage" src="enter2.PNG" width="180px" style="border:none;">
				<img id="enterimage" class="enterimage" src="enter.PNG" width="180px" style="border:none;">
				
				<a href = "home.html"></a>
			</div>
			<div class="clear"></div>
		</div>
		
	</body>
</html>