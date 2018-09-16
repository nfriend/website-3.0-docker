<?php
	session_start();
	if($_SESSION['animation'] != 1 && $_SESSION['animation'] != 2) {
		$_SESSION['animation'] = 2;
	}
	include('createmenus1.php');
?>
		
		<title>Nathan Friend: Links</title>
<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus2.php');
	} else {
		include('createmenus2noa.php');
	}
?>
		<div id="title">
			<h1>links</h1>
		</div>
<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus3.php');
	} else {
		include('createmenus3noa.php');
	}
?>
				<h2>Links</h2>
				<hr/>
				<a href="http://facebook.com/nathan.friend"><img src="facebook_logo.png" align="center" height="100px"/></a>
				<a href="http://linkedin.com/in/nfriend"><img src="linkedin-logo.png" align="center" height="100px"/></a>									
<?php
	include('createmenus4.php');
?>