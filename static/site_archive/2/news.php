<?php
	session_start();
	if($_SESSION['animation'] != 1 && $_SESSION['animation'] != 2) {
		$_SESSION['animation'] = 2;
	}
	include('createmenus1.php');
?>
		<title>Nathan Friend: News</title>
		
<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus2.php');
	} else {
		include('createmenus2noa.php');
	}
?>		
		
		<div id="title">
			<h1>news</h1>
		</div>
		
<?php
	if($_SESSION['animation'] == 2) {
		include('createmenus3.php');
	} else {
		include('createmenus3noa.php');
	}
?>

		
			<h2>News</h2>
				<hr/>
								
				<div id="accordion"> 
					<h2><a href="#">August 9, 2011</a></h2> 
					<div> 
						<p> 
						Yeah I'm in PEI.  What's up.
						</p> 
					</div>
					<h2><a href="#">August 7, 2011</a></h2> 
					<div> 
						<p> 
						Just arrived in Boston.  I'll be sitting on the beaches of PEI in a mere two days!
						</p> 
					</div>
					<h2><a href="#">August 5, 2011</a></h2> 
					<div> 
						<p> 
						My new site is almost done!
						</p> 
					</div> 
					<h2><a href="#">August 3, 2011</a></h2> 
					<div> 
						<p>I've decided to start on a new website design... We'll see what I come up with.
						</p> 
					</div> 
					<h2><a href="#">July 7, 2011</a></h2> 
					<div> 
						<p>Seven months until my birthday!</p> 
					</div>
				</div>
							
<?php
	include('createmenus4.php');
?>