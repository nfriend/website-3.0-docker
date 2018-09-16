<?php
	session_start();
	if($_SESSION['animation'] != 1 && $_SESSION['animation'] != 2) {
		$_SESSION['animation'] = 2;
	}
	include('createmenus1.php');
?>
		
		<title>Nathan Friend: Contact</title>

<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus2.php');
	} else {
		include('createmenus2noa.php');
	}
?>		
		
		<div id="title">
			<h1>send</h1>
		</div>

<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus3.php');
	} else {
		include('createmenus3noa.php');
	}
?>
	
	<h2>Contact Me</h2>
	<h2 style="font-size: 14px; margin: 0px;">* not working at the moment!</h2>
				<hr/>				
					<form action="http://nathanfriend.site90.com/sendmail.php">
						<h3 style="font-size: 15px; margin:5px;">Your name:</h3>
						<textarea name="name" rows="1" cols="37" style="margin: 10px;"></textarea>
						<h3 style="font-size: 15px; margin:5px;">Your message:</h3>
						<textarea name="message" rows="10" cols="37" style="margin: 10px;"></textarea>
						<div class="clear"></div>				
						<input type="submit" value="Send" style="font-size:20px;"/>
					</form>

<?php
	include('createmenus4.php');
?>