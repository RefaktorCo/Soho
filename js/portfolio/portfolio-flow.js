jQuery(document).ready(function(){
	"use strict";
	jQuery('#whaterwheel').owlCarousel({
		loop:true,
		nav:false,
		margin:15,
		center:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:2
			},
			760:{
				items:2
			},            
			960:{
				items:4
			},
			1200:{
				items:4
			}
		}
	});
	var whaterwhltimer = setTimeout(function(){
		jQuery('#whaterwheel').animate({opacity : 1}, 500);
		clearTimeout(whaterwhltimer);
	}, 500);
});