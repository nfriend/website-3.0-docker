
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device_display, initial-scale=1.0" />		
	<title>Nathan Friend</title>		
<!-- 	<link rel="stylesheet" href="Styles/stylesheet.css" /> -->
	
	<!--[if IE 6]><script type="text/javascript">window.location="browser.html";</script><![endif]-->
	<!--[if IE 7]><script type="text/javascript">window.location="browser.html";</script><![endif]-->
			
<!-- 	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<!--	<script type="text/javascript" src='<?php print drupal_get_path('theme', 'nfmobile') . '/Scripts/resize.js'; ?>'></script>
//	<script type="text/javascript" src='<?php print drupal_get_path('theme', 'nfmobile') . '/Scripts/init.js'; ?>'></script>
	</script>		-->
</head>

<body>
	<div id="container">
		<div id="header-container">
			<div id="header-first">
				<a id="logo-container" href='<?php $base_path; ?>'>
					<h1 class='logo-letters' id='logo-letters-nathan' style="float: left; color: #CE1417">nathan</h1>
					<h1 class='logo-letters' id='logo-letters-friend' style="float: left; color: #000000">friend</h1>
					<h1 class='logo-letters phase1' style="float: left; color: #D6D6D6">.com</h1>
				</a>
			</div>
			<div id="header-second">
				<div id="menu-item-container">
					<a href='<?php print $base_path . 'contact'; ?>'class='menu-item'><img src='<?php print $base_path . drupal_get_path('theme', 'nfmobile') . '/Images/contact.png'; ?>' /></a>
					<a href='<?php print $base_path . 'blog'; ?>' class='menu-item'><img src='<?php print $base_path . drupal_get_path('theme', 'nfmobile') . '/Images/blog.png'; ?>' /></a>
					<a href='<?php print $base_path; ?>' class='menu-item'><img src='<?php print $base_path . drupal_get_path('theme', 'nfmobile') . '/Images/home.png'; ?>' /></a>
				</div>
			</div>
		</div>
		<div id='main-horizontal-separator'></div>
		<div id="content-container">
			<div id="content">
				<h2 id="contenttitle"><?php print $title; ?></h2>
				<p><?php print render($page['content']); ?></p>
			</div>
			<?php if ($page['sidebar']): ?>
				<div id="sidebar">
					<p style="margin-left: 10px; margin-right: 10px;"><?php print render($page['sidebar']); ?></p> 
				</div>
			<?php endif; ?>
		</div>
		<div class='cleared' style="height: 15px;"></div>
		<?php if ($page['footer']): ?>	
			<div id="footer">
				<p style="margin-left: 10px; margin-right: 10px;"><?php print render($page['footer']); ?></p>
			</div>
		<?php endif; ?>
	</div>
</body>

