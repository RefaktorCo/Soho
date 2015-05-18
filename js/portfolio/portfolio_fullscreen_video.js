jQuery(document).ready(function(){
	"use strict";
	jQuery('.post_info').on("click", function(){
		if (!jQuery(this).hasClass('noContent')) {
			html.toggleClass('show_content');
		}
	});
	jQuery('.share_toggle').on("click", function(){
		jQuery('.share_block').toggleClass('show_share');
	});							
});