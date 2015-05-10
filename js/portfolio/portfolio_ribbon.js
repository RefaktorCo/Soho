function ribbon_setup() {
	"use strict";	
	if (window_w > 760) {
		var setHeight = window_h - header.height() - 15;
		var setHeight2 = window_h - header.height() - jQuery('.slider_info').height() - 30;
		jQuery('.fs_grid_gallery').height(window_h - 1).width(window_w);

		jQuery('.currentStep').removeClass('currentStep');
		jQuery('.slide1').addClass('currentStep');
		jQuery('.num_current').text('1');
		
		jQuery('.num_all').text(jQuery('.ribbon_list li').size());
		jQuery('.ribbon_wrapper').height(setHeight2).css('top', header.height()+15);
		jQuery('.ribbon_list .slide_wrapper').height(setHeight2);
		jQuery('.ribbon_list').height(setHeight2).width(15).css({'left' : 0});
		jQuery('.slider_caption').text(jQuery('.currentStep').attr('data-title'));
		jQuery('.ribbon_list').find('li').each(function(){
			jQuery('.ribbon_list').width(jQuery('.ribbon_list').width()+jQuery(this).width());
			jQuery(this).attr('data-offset',jQuery(this).offset().left);
			jQuery(this).width(jQuery(this).find('img').width() + parseInt(jQuery(this).find('.slide_wrapper').css('margin-left'), 10));
		});
		var max_step = -1*(jQuery('.ribbon_list').width()-window_w);
	} else {
		jQuery('.ribbon_list').css('padding-top', jQuery('.slider_info').height());
	}
}
function prev_slide() {
	"use strict";
	var max_step = -1*(jQuery('.ribbon_list').width()-window_w);
	var current_slide = parseInt(jQuery('.currentStep').attr('data-count'), 10);
	current_slide--;
	if (current_slide < 1) {
		current_slide = jQuery('.ribbon_list').find('li').size();
	}
	jQuery('.currentStep').removeClass('currentStep');
	jQuery('.num_current').text(current_slide);
	jQuery('.slide'+current_slide).addClass('currentStep');
	if (-1*jQuery('.slide'+current_slide).attr('data-offset') > max_step) {
		jQuery('.ribbon_list').css('left', -1*jQuery('.slide'+current_slide).attr('data-offset'));
	} else {
		jQuery('.ribbon_list').css('left', max_step);
	}
}
function next_slide() {	
	"use strict";	
	var max_step = -1*(jQuery('.ribbon_list').width()-window_w);
	var current_slide = parseInt(jQuery('.currentStep').attr('data-count'), 10);
	current_slide++;
	if (current_slide > jQuery('.ribbon_list').find('li').size()) {
		current_slide = 1
	}
	jQuery('.currentStep').removeClass('currentStep');
	jQuery('.num_current').text(current_slide);
	jQuery('.slide'+current_slide).addClass('currentStep');
	if (-1*jQuery('.slide'+current_slide).attr('data-offset') > max_step) {
		jQuery('.ribbon_list').css('left', -1*jQuery('.slide'+current_slide).attr('data-offset'));
	} else {
		jQuery('.ribbon_list').css('left', max_step);
	}
}
jQuery(document).ready(function(){
	"use strict";
	jQuery('#ribbon_swipe').on("swipeleft", function(){
		next_slide();
	});
	jQuery('#ribbon_swipe').on("swiperight", function(){
		prev_slide();
	});			
	jQuery('.btn_prev').on("click", function(){
		prev_slide();
	});
	jQuery('.btn_next').on("click", function(){
		next_slide();
	});
	jQuery(document.documentElement).keyup(function (event) {
		if ((event.keyCode == 37) || (event.keyCode == 40)) {
			prev_slide();
		} else if ((event.keyCode == 39) || (event.keyCode == 38)) {
			next_slide();
		}
	});

	jQuery('.ribbon_list img').on("swipeleft", function(){
		next_slide();
	});
	jQuery('.ribbon_list img').on("swiperight", function(){
		prev_slide();
	});

	jQuery('.share_toggle').on("click", function(){
		jQuery('.share_block').toggleClass('show_share');
	});			
	
	jQuery('.slide1').addClass('currentStep');
	ribbon_setup();			
	var ribbonsettimer = setTimeout(function(){
		ribbon_setup();
		clearTimeout(ribbonsettimer);
	}, 700);	
	
	jQuery('.post_info').on("click", function(){
		if (!jQuery(this).hasClass('noContent')) {
			html.toggleClass('show_content');
		}
	});		
});	
jQuery(window).resize(function(){
	"use strict";
	ribbon_setup();
	var ribbonsettimer = setTimeout(function(){
		ribbon_setup();
		clearTimeout(ribbonsettimer);
	}, 500);			
});	
jQuery(window).load(function(){
	"use strict";
	ribbon_setup();
	var ribbonsettimer = setTimeout(function(){
		ribbon_setup();
		clearTimeout(ribbonsettimer);
	}, 350);
});		