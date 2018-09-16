		$(init)
			
			var animation;
			
			function init() {
				$("#label1").hover(slideOut1, slideBack1);
				$("#label2").hover(slideOut2, slideBack2);
				$("#label3").hover(slideOut3, slideBack3);
				$("#label4").hover(slideOut4, slideBack4);
				$("#label5").hover(slideOut5, slideBack5);
				$("#label6").hover(slideOut6, slideBack6);
				
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
				$("#label1").animate ( {
					"left": "120px"
				}, 500)
				$("#label1").css("cursor", "pointer");
				$("#label1").clearQueue();
			}			
			function slideBack1() {
				$("#label1").animate ( {
					"left": "0px"
				}, 500)
				$("#label1").clearQueue();
			}
			function slideOut2() {
				$("#label2").animate ( {
					"left": "198px"
				}, 500)
				$("#label2").css("cursor", "pointer");
				$("#label2").clearQueue();
			}			
			function slideBack2() {
				$("#label2").animate ( {
					"left": "0px"
				}, 500)
				$("#label2").clearQueue();
			}
			function slideOut3() {
				$("#label3").animate ( {
					"left": "112px"
				}, 500)
				$("#label3").css("cursor", "pointer");
				$("#label3").clearQueue();
			}			
			function slideBack3() {
				$("#label3").animate ( {
					"left": "0px"
				}, 500)
				$("#label3").clearQueue();
			}
			function slideOut4() {
				$("#label4").animate ( {
					"left": "95px"
				}, 500)
				$("#label4").css("cursor", "pointer");
				$("#label4").clearQueue();
			}			
			function slideBack4() {
				$("#label4").animate ( {
					"left": "0px"
				}, 500)
				$("#label4").clearQueue();
			}
			function slideOut5() {
				$("#label5").animate ( {
					"left": "161px"
				}, 500)
				$("#label5").css("cursor", "pointer");
				$("#label5").clearQueue();
			}	
			function slideBack5() {
				$("#label5").animate ( {
					"left": "0px"
				}, 500)
				$("#label5").clearQueue();
			}
			function slideOut6() {
				$("#label6").animate ( {
					"left": "150px"
				}, 500)
				$("#label6").css("cursor", "pointer");
				$("#label6").clearQueue();
			}	
			function slideBack6() {
				$("#label6").animate ( {
					"left": "0px"
				}, 500)
				$("#label6").clearQueue();
			}
			
			function slidein() {
				$("#templaterightdiv").animate( {
					"margin-left": "-152px"					
				}, 800);
				$("#templateleftdiv").delay(100).animate( {
					"margin-left": "-304px"					
				}, 1000);
				$("#label6").delay(1100).animate( {
					"margin-right": "-10px"
				}, 300)
				$("#label5").delay(1200).animate( {
					"margin-right": "-10px"
				}, 300)				
				$("#label4").delay(1300).animate( {
					"margin-right": "-10px"
				}, 300)
				$("#label3").delay(1400).animate( {
					"margin-right": "-10px"
				}, 300)				
				$("#label2").delay(1500).animate( {
					"margin-right": "-10px"
				}, 300)								
				$("#label1").delay(1600).animate( {
					"margin-right": "-10px"
				}, 300)
				$("#title").animate( {
					"opacity": ".1"
				}, 2000)
				$("#background").animate( {
					"opacity": ".05"
				}, 2000)
				$("#buttoncontainer").delay(2000).animate( {
					"bottom": "-13px"
				}, 300)		
				
			}
			
			function setAnimation(value) {
				if(value) {
					$.post("/changesession.php", {"animationbutton": 2})					
				} else {
					$.post("/changesession.php", {"animationbutton": 1})					
				}
			} 
