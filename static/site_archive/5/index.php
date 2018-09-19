<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Nathan Friend</title>
		<meta name="description" content="" />
		<meta name="generator" content="Studio 3 http://aptana.com/" />
		<meta name="author" content="Friend" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="stylesheet" type="text/css" href="template.css">
		
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		
		<script type="text/javascript">
			google.load("jquery", "1");			
		</script>
				
		<script type="text/javascript" src="jquery.scrollTo-min.js"></script>
		<script type="text/javascript" src="easing.js"></script>
		
		<script type="text/javascript">
			$(init);
			
			function init() {				
				
								
				$("#centerabout").hover(centeraboutchange, centeraboutchangeback);
				$("#centercontact").hover(centercontactchange, centercontactchangeback);
				
				$("#lefthome").hover(lefthomechange, lefthomechangeback);
				$("#leftcontact").hover(leftcontactchange, leftcontactchangeback);
				
				$("#rightabout").hover(rightaboutchange, rightaboutchangeback);
				$("#righthome").hover(righthomechange, righthomechangeback);
				
				$("#centerabout").click(scrollleft);
				$("#centercontact").click(scrollright);
				
				$("#leftcontact").click(scrollfarright);
				$("#lefthome").click(scrollright);
				
				$("#rightabout").click(scrollfarleft);
				$("#righthome").click(scrollleft);	
			
				
			}
			function scrollleft() {
				$("#container").animate( {left: '+=100%'}, 1000, 'easeInOutExpo');
			}
			
			function scrollfarleft() {
				$("#container").animate( {left: '+=200%'}, 1000, 'easeInOutExpo');
			}
			
			function scrollright() {
				$("#container").animate( {left: '-=100%'}, 1000, 'easeInOutExpo');
			}
			
			function scrollfarright() {
				$("#container").animate( {left: '-=200%'}, 1000, 'easeInOutExpo');
			}
			
			
			function centeraboutchange() {
				$("#centerabout").attr('src', 'about2.png');
			}
			
			function centeraboutchangeback() {
				$("#centerabout").attr('src', 'about.png');
			}
			
			function centercontactchange() {
				$("#centercontact").attr('src', 'contact2.png');
			}
			function centercontactchangeback() {
				$("#centercontact").attr('src', 'contact.png');
			}
			
			
			function lefthomechange() {
				$("#lefthome").attr('src', 'lhome2.png');
			}
			
			function lefthomechangeback() {
				$("#lefthome").attr('src', 'lhome.png');
			}
			
			function leftcontactchange() {
				$("#leftcontact").attr('src', 'lcontact2.png');
			}
			
			function leftcontactchangeback() {
				$("#leftcontact").attr('src', 'lcontact.png');
			}
			
			
			function rightaboutchange() {
				$("#rightabout").attr('src', 'rabout2.png');
			}
			
			function rightaboutchangeback() {
				$("#rightabout").attr('src', 'rabout.png');
			}
			
			function righthomechange() {
				$("#righthome").attr('src', 'rhome2.png');
			}
			
			function righthomechangeback() {
				$("#righthome").attr('src', 'rhome.png');
			}
			
		</script>
		
	</head>
	<body>
		
		<?php			
			include('backgrounds.php');			
		?>		
		
		<img id="gradientstripes" src="gradientstripes.png"/>
		
		<div id="container">
			<div id="center">
				<img id="blackgradientflipped" src="blackgradientflipped.png" />
				<img id="signature" src="signaturewhite.png" />
				<img id="cellokeyboard" src="cellokeyboardedited.png" />
				<img id="centerabout" src="about.png" />
				<img id="centercontact" src="contact.png" />
			</div>
			<div id="left">
				<img id="transback" src="transback.png" />
				<img id="transbackgradient" src="transbackgradient.png" />
				<img id="guitarcd" src="guitarcd.png" />
				<img id="lefthome" src="lhome.png" />
				<img id="leftcontact" src="lcontact.png" />
			</div>
			<div id="right">
				<img id="transback" src="transback.png" />
				<img id="transbackgradient" src="transbackgradient.png" />				
				<img id="scrollusb" src="scrollusb.png" />
				<img id="righthome" src="rhome.png" />
				<img id="rightabout" src="rabout.png" />
			</div>				
				
		</div>
	</body>
</html>