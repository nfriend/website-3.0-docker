<html>
	<body>
		<?php
		
			echo('
		
							<div id="container">
							<div id="templateleftdiv">
								<img src="NATHAN.PNG" height = "660px" style="position:relative; top:50%; margin-top: -330px;"></img>			
							</div>
							<div id="templaterightdiv">
								<img src="FRIEND.PNG" height = "660px" style="position:relative; top:50%; margin-left: 10px; margin-top: -330px;"></img>				
							</div>
							<div class="clear"></div>
						</div>
						<div id="menucontainer" align="right">
							<h5 id="label1" class="label" style="position:relative;"><img id="button1" class="button" src="buttonin.png" width="20px"/> home</h5>
							<h5 id="label2" class="label" style="position:relative;"><img id="button2" class="button" src="buttonin.png" width="20px"/> about me</h5>
							<h5 id="label3" class="label" style="position:relative;"><img id="button3" class="button" src="buttonin.png" width="20px"/> news</h5>
							<h5 id="label4" class="label" style="position:relative;"><img id="button4" class="button" src="buttonin.png" width="20px"/> links</h5>
							<h5 id="label5" class="label" style="position:relative;"><img id="button5" class="button" src="buttonin.png" width="20px"/> contact</h5>
							<h5 id="label6" class="label" style="position:relative;"><img id="button6" class="button" src="buttonin.png" width="20px"/> old site</h5>			
						</div>
						
						<div id="buttoncontainer" align="center">
							<h3 style="font-size: 20px; margin: 5px;">Animation</h3>				
							<div id="radio" style="margin: 6px; margin-right: 11px; font-size: 12px;">
								<input type="radio" onclick="setAnimation(true)" id="radio1" name="radio"/><label for="radio1">On</label>
								<input type="radio" onclick="setAnimation(false)" id="radio2" name="radio" checked="checked"/><label for="radio2">Off</label>				
							</div>						
						</div>	
						
						<div id="content" align="center">
							<div id="layer"></div>
							<div id="innercontent" align="center">	
						
						
			');
			
		?>
				
	</body>
</html>