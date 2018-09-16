<?php
	session_start();
	if($_SESSION['animation'] != 1 && $_SESSION['animation'] != 2) {
		$_SESSION['animation'] = 2;
	}
	include('createmenus1.php');
?>
		
		<title>Nathan Friend: About Me</title>

<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus2.php');
	} else {
		include('createmenus2noa.php');
	}
?>
		<div id="title">
			<h1>about</h1>
		</div>

<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus3.php');
	} else {
		include('createmenus3noa.php');
	}
?>	
				<h2>Thanks for asking!</h2>
				<hr/>
				<div align="left">
					<h4><img src="me.png" align="left" width="200px" style="padding: 5px; border: groove; border-radius: 15px; margin-right: 15px; margin-bottom: 15px;"/>My name's Nathan Friend.  I'm a junior at Dordt College; I study Computer Science and Music Performance.</h4>					
				</div>
<?php
	include('createmenus4.php');
?>
		
		
	</body>
</html>