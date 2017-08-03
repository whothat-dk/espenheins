jQuery(document).ready(function($) {
	jQuery(".search_ajax").focusout(function(event) {
		jQuery(".search_ajax").val("");
	});

	jQuery( window ).resize(function() {
		console.log(jQuery(window).width());
		if(jQuery(window).width() > 799){
			if(jQuery("body").hasClass('open_menu')){
				jQuery(".burger-bar").removeClass('active-burger');
				hide_menu();
			}

		}
	});

	jQuery(".burger-bar").click(function(event) {

		if(jQuery("body").hasClass('open_menu')){
			jQuery(".burger-bar").removeClass('active-burger');
			hide_menu();

		} else {
			jQuery(".burger-bar").addClass('active-burger');
			jQuery("body").addClass('open_menu');
			show_menu();
		}
	});
	function show_menu(){
		setTimeout(function() {
	    jQuery('.anim').each(function(i) { 
	    	var row = jQuery(this);
	    	setTimeout(function() { row.addClass('slideInDown'); }, 100*i);
	    	setTimeout(function() { row.removeClass('slideOutDown'); }, 100*i);
	    		
	    	});
		}, 350);
	}
	function hide_menu(){
		jQuery('.anim').removeClass('slideInDown');
		jQuery('.anim').addClass('slideOutDown');
    	setTimeout(function() { jQuery("body").removeClass('open_menu'); }, 350);
	}


});