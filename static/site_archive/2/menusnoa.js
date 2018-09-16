		$(init)
			
			function init() {
							
				$("#label1").click( function() {window.location = "home.php"});
				$("#label2").click( function() {window.location = "aboutme.php"});
				$("#label3").click( function() {window.location = "news.php"});
				$("#label4").click( function() {window.location = "links.php"});
				$("#label5").click( function() {window.location = "contact.php"});	
				$("#label6").click( function() {window.location = "/site_archive/1/"});
				
				$("#accordion").accordion();
				$("#radio").buttonset();
				$("input:submit").button();
							
			}			
			
			
			function slideOut1() {
				$("#label1").css ( {
					"left": "120px"
				}, 500)
				$("#label1").css("cursor", "pointer");
			}	
			function slideOut2() {
				$("#label2").css ( {
					"left": "198px"
				}, 500)
				$("#label2").css("cursor", "pointer");
			}	
			function slideOut3() {
				$("#label3").css ( {
					"left": "112px"
				}, 500)
				$("#label3").css("cursor", "pointer");
			}	
			function slideOut4() {
				$("#label4").css ( {
					"left": "95px"
				}, 500)
				$("#label4").css("cursor", "pointer");
			}
			function slideOut5() {
				$("#label5").css ( {
					"left": "161px"
				}, 500)
				$("#label5").css("cursor", "pointer");
			}	
			function slideOut6() {
				$("#label6").css ( {
					"left": "150px"
				}, 500)
				$("#label6").css("cursor", "pointer");
			}				
			
			function slidein() {
				
				slideOut1();
				slideOut2();
				slideOut3();
				slideOut4();
				slideOut5();
				slideOut6();				
				
				$("#templaterightdiv").css( {
					"margin-left": "-152px"					
				}, 800);
				$("#templateleftdiv").css( {
					"margin-left": "-304px"					
				}, 1000);
				$("#label6").css( {
					"margin-right": "-10px"
				}, 300)
				$("#label5").css( {
					"margin-right": "-10px"
				}, 300)				
				$("#label4").css( {
					"margin-right": "-10px"
				}, 300)
				$("#label3").css( {
					"margin-right": "-10px"
				}, 300)				
				$("#label2").css( {
					"margin-right": "-10px"
				}, 300)								
				$("#label1").css( {
					"margin-right": "-10px"
				}, 300)
				$("#title").css( {
					"opacity": ".1"
				}, 2000)
				$("#background").css( {
					"opacity": ".05"
				}, 2000)
				$("#buttoncontainer").css( {
					"bottom": "-13px"
				}, 300)	
							
			}
			
			function setAnimation(value) {
				if(value) {
					$.post("changesession.php", {"animationbutton": 2})					
				} else {
					$.post("changesession.php", {"animationbutton": 1})					
				}
			} 
