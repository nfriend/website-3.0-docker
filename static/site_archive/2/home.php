<?php
	session_start();
	if($_SESSION['animation'] != 1 && $_SESSION['animation'] != 2) {
		$_SESSION['animation'] = 2;
	}
	include('createmenus1.php');
?>
		<title>Nathan Friend: Home</title>

<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus2.php');
	} else {
		include('createmenus2noa.php');
	}
?>
		<div id="title">
			<h1>home</h1>
		</div>

<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus3.php');
	} else {
		include('createmenus3noa.php');
	}
?>	
				<h2>Welcome.</h2>
				<hr/>
				<h3>Thanks for dropping by.  I hope your experience is absolutely peachy.</h3>	
				<hr/>
				<h3 style="font-size: 20px;">By the way, this website really only looks good in Google Chrome.					
				</h3>				
<?php
	include('createmenus4.php');
?>