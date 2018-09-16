jQuery(init);
			
function init()	{
	window.headerFirst = jQuery("#header-first");
	window.headerSecond = jQuery("#header-second");
	window.content = jQuery("#content");
	window.sidebar = jQuery("#sidebar");
	window.footer = jQuery("#footer");
	window.container = jQuery("#container");
	window.headerContainer = jQuery("#header-container");
	window.contentContainer = jQuery("#content-container");
	window.contentTitle = jQuery("#contenttitle");	

	adjustLayout();
	jQuery(window).resize(adjustLayout);
	
	jQuery(".menu-item").hover(function() {
		jQuery(this).css({backgroundColor: '#AA1212'});
	}, function() {
		jQuery(this).css({backgroundColor: '#CE1417'});
	});

//	jQuery(".horizontal-separator:last").remove();
}
