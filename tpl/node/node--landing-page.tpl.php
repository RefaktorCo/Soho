<div class="landing_preloader"></div>
<a href="<?php if ($content['field_lp_logo_link']) {print render($content['field_lp_logo_link']);} else {print "#";} ; ?>" class="landing_logo loading type1 circle">
  <div class="logo_def"><?php if ($content['field_lp_logo_image']) {print render($content['field_lp_logo_image']);} ?></div>
</a>

<div class="custom_bg img_bg def_img opacity0"></div>

<?php 
if (render($content['field_lp_background_image'])) {
  drupal_add_css(
    '.def_img{background-image: url('. file_create_url($node->field_lp_background_image['und'][0]['uri']) .');}',
    array(
      'group' => CSS_THEME,
      'type' => 'inline',
      'media' => 'screen',
      'preprocess' => FALSE,
      'weight' => '9999',
    )
  );
}

if (!empty($content['field_lp_disable_header']['#items'][0]['value']) == '1') { 
	drupal_add_css(
    '.main_header{display: none;}',
    array(
      'group' => CSS_THEME,
      'type' => 'inline',
      'media' => 'screen',
      'preprocess' => FALSE,
      'weight' => '9999',
    )
  );
}
?>

<script>
	function start_preloader() {
		"use strict";
		jQuery('.landing_preloader').animate({'width' : '100%'},3000, function(){
			jQuery('.landing_logo').removeClass('loading');
		});
	}
	jQuery(document).ready(function() {
		"use strict";
		if (jQuery('.landing_logo').find('img').height() > jQuery('.landing_logo').find('img').width()) {
			var set_a_size = jQuery('.landing_logo').find('img').height();
		} else {
			var set_a_size = jQuery('.landing_logo').find('img').width();
			jQuery('.landing_logo').find('img').css('margin-top', (set_a_size - jQuery('.landing_logo').find('img').height())/2-13+'px');
		}
		jQuery('.landing_logo').css({'margin-top' : '-'+(set_a_size/2+52)+'px', 'margin-left' : '-'+(set_a_size/2+52)+'px'}).width(set_a_size).height(set_a_size);
		var preloadertimer = setTimeout(function(){
			jQuery('.custom_bg').animate({'opacity' : '1'}, 1000);
			start_preloader();
			clearTimeout(preloadertimer);
		}, 500);
	});		
</script>    