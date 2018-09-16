function adjustLayout() {
	
	var containerWidth = container.width(); 
	var isSidebar = (sidebar.size() !== 0);	

	// footer.html(containerWidth);
	
	if (containerWidth > 740) {
		jQuery('.phase1').css({display: ''});
		jQuery('.logo-letters').css({float: 'left'});
		jQuery('#logo-letters-nathan').css({marginBottom: '0px'});
		jQuery('#logo-letters-friend').css({marginTop: '0px'});
		
		headerFirst.css({
			float: '',
			width: '',
			textAlign: ''
		});
		headerSecond.css({
			float: '',
			width: '',
			textAlign: ''
		});
		

		if (isSidebar) {
			content.css({
				float: '',
				width: containerWidth - sidebar.width() - 50 + 'px',
				maxWidth: '100%'
			});
			jQuery('.horizontal-separator').css({
				width: ((containerWidth - sidebar.width()) / 2) + 'px',
				marginLeft: ((containerWidth - sidebar.width()) / 4) + 'px'
			});
		} else {
			content.css({
				float: 'none',
				width: '100%',
				maxWidth: '100%'
			});
			jQuery('.horizontal-separator').css({
				width: '50%',
				marginLeft: 'auto'
			});
		}		

		contentTitle.css({
			float: '',
			width: '',
			textAlign: '',
			maxWidth: ''
		});
		sidebar.css({
			float: '',
			width: '',
			textAlign: ''
		});	
	} else if (containerWidth >= 610 && containerWidth <= 740) {
		jQuery('.phase1').css({display: 'none'});
		jQuery('.logo-letters').css({float: 'left'});
		jQuery('#logo-letters-nathan').css({marginBottom: '0px'});
		jQuery('#logo-letters-friend').css({marginTop: '0px'});
		
		headerFirst.css({
			float: '',
			width: '',
			textAlign: ''
		});
		headerSecond.css({
			float: '',
			width: '',
			textAlign: ''
		});
		
		content.css({
			float: 'none',
			width: '100%',
			maxWidth: '100%'
		});
		contentTitle.css({
			float: '',
			width: '',
			textAlign: '',
			maxWidth: ''
		});
		sidebar.css({
			float: 'none',
			width: '100%',
			textAlign: 'center'
		});	
		jQuery('.horizontal-separator').css({
			width: '50%',
			marginLeft: 'auto'
		});
	} else if (containerWidth >= 400 && containerWidth < 610) {
		jQuery('.phase1').css({display: 'none'});
		jQuery('.logo-letters').css({float: 'left'});
		jQuery('#logo-letters-nathan').css({marginBottom: '0px'});
		jQuery('#logo-letters-friend').css({marginTop: '0px'});
		
		headerFirst.css({
			float: 'none',
			width: '100%',
			textAlign: 'center'
		});
		headerSecond.css({
			float: 'none',
			width: '100%',
			textAlign: 'center'
		});
		content.css({
			float: 'none',
			width: '100%',
			maxWidth: '100%'
		});
		contentTitle.css({
			float: 'none',
			width: '100%',
			textAlign: 'center',
			maxWidth: '100%'
		});
		sidebar.css({
			float: 'none',
			width: '100%',
			textAlign: 'center'
		});
		jQuery('.horizontal-separator').css({
			width: '50%',
			marginLeft: 'auto'
		});
	} else if (containerWidth < 400) {
		jQuery('.phase1').css({display: 'none'});
		jQuery('.logo-letters').css({float: 'none'});
		jQuery('#logo-letters-nathan').css({marginBottom: '-25px'});
		jQuery('#logo-letters-friend').css({marginTop: '-25px'});
		
		headerFirst.css({
			float: 'none',
			width: '100%',
			textAlign: 'center'
		});
		headerSecond.css({
			float: 'none',
			width: '100%',
			textAlign: 'center'
		});
		content.css({
			float: 'none',
			width: '100%',
			maxWidth: '100%'
		});
		contentTitle.css({
			float: 'none',
			width: '100%',
			textAlign: 'center',
			maxWidth: '100%'
		});
		sidebar.css({
			float: 'none',
			width: '100%',
			textAlign: 'center'
		});
		jQuery('.horizontal-separator').css({
			width: '50%',
			marginLeft: 'auto'
		});
	}
	return;
	
	
}
