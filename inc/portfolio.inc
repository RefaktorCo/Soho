<?php
	
function portfolio_fullwidth($node) {
	$output = '';
	$output .= '<div class="pf_output_container"><div class="slider-wrapper theme-default"><div class="nivoSlider"> ';
	
	if (!empty($node->field_portfolio_gallery)) {
		foreach ($node->field_portfolio_gallery['und'] as $item) {		
		  $output .= '<img alt="" src="'.file_create_url($item['uri']).'" />';
		}
	}
	$output .= '</ul></div></div></div>';
	return $output;
}

function portfolio_fullscreen_video($node) {
  drupal_add_js(drupal_get_path('theme', 'soho') . '/js/portfolio/portfolio_fullscreen_video.js');
	
	global $base_url;
	$share_link = ''.$base_url.'/'.current_path().'';
	$count = 1;
	$output = '';
	
  $output .= '
     <div class="fullscreen_block fw_background bg_video loaded">
    	'.$node->field_media_embed['und'][0]['value'].'
    </div>
		<div class="fs_controls fs_controls-port fs-port-standart">
      <div class="share_block">
          <a href="javascript:void(0)" class="share_toggle">Share</a>
          <div class="share_box">
              <a href="http://www.facebook.com/share.php?u='.$share_link.'" target="_blank" class="share_facebook"><i class="stand_icon icon-facebook-square"></i></a>
                                                          
          <a href="https://twitter.com/intent/tweet?text='.drupal_get_title().'&url='.$share_link.'" target="_blank" class="share_tweet"><i class="stand_icon icon-twitter"></i></a>
          <a href="https://plus.google.com/share?url='.$share_link.'" target="_blank" class="share_gplus"><i class="icon-google-plus-square"></i></a>
          </div>
      </div>
      <div class="title_wrapper">
          <h1 class="fs_title_main">'.$node->title.'</h1>
      </div>
      <div class="fs_controls_append">                
          <a href="javascript:void(0)" class="post_info hasContent"></a>
          <a href="javascript:history.back()" class="fs_close"></a>
      </div>
      
    </div><!-- .fullscreen_content_wrapper --> </div>
  ';
  
	return $output;
}	


function portfolio_fullscreen_slider($node) {
	drupal_add_js(drupal_get_path('theme', 'soho') . '/js/portfolio/portfolio_fullscreen_slider.js');
	drupal_add_js(drupal_get_path('theme', 'soho') . '/js/fs_gallery.js',array('type' => 'file','scope' => 'footer'));
	
	global $base_url;
	$share_link = ''.$base_url.'/'.current_path().'';
	$count = 1;
	$output = '';
	
  $output .= '
		<div class="fs_controls fs_controls-port fs-port-standart">
      <div class="share_block">
          <a href="javascript:void(0)" class="share_toggle">Share</a>
          <div class="share_box">
              <a href="http://www.facebook.com/share.php?u='.$share_link.'" target="_blank" class="share_facebook"><i class="stand_icon icon-facebook-square"></i></a>
          <a href="http://pinterest.com/pin/create/button/?url='.$share_link.'&media='.file_create_url($node->field_portfolio_gallery['und'][0]['uri']).'" target="_blank" class="share_pinterest"><i class="stand_icon icon-pinterest"></i></a>                                                            
          <a href="https://twitter.com/intent/tweet?text='.drupal_get_title().'&url='.$share_link.'" target="_blank" class="share_tweet"><i class="stand_icon icon-twitter"></i></a>
          <a href="https://plus.google.com/share?url='.$share_link.'" target="_blank" class="share_gplus"><i class="icon-google-plus-square"></i></a>
          </div>
      </div>
      <div class="title_wrapper">
          <h1 class="fs_title_main">'.$node->title.'</h1>
      </div>
      <div class="fs_controls_append">                
          <a href="javascript:void(0)" class="close_controls"></a>
          <a href="javascript:history.back()" class="fs_close"></a>
      </div>
      <div class="fs_close_unbinder"></div>
    </div><!-- .fullscreen_content_wrapper --> </div>
    <a href="javascript:void(0)" class="close_controls show_me_always in_post in_port has_content"></a>
  ';
  
  $output .='<script>';
  $output .='gallery_set = [';
  if (!empty($node->field_portfolio_gallery)) {
	  foreach ($node->field_portfolio_gallery['und'] as $item) {
		  $output .= '{type: "image", image: "'.file_create_url($item['uri']).'"},';
	  }
  }
  $output .=']';
  $output .='</script>';
  
	return $output;
}	
	
	
function portfolio_ribbon($node) {
	
	drupal_add_js(drupal_get_path('theme', 'soho') . '/js/portfolio/portfolio_ribbon.js');
	global $base_url;
	$share_link = ''.$base_url.'/'.current_path().'';
	$count = 1;
	$output = '';
	$output .= '<div class="fullscreen-gallery hided"><div class="ribbon_wrapper"><div class="ribbon_list_wrapper"><ul class="ribbon_list">';
	if (!empty($node->field_portfolio_gallery)) {
		foreach ($node->field_portfolio_gallery['und'] as $item) {
					
		  $output .= '<li data-count="'.$count.'" class="slide'.$count.'">';	
		  $output .= '<div class="slide_wrapper"><img alt="" src="'.file_create_url($item['uri']).'" /></div>';
		  $output .= '</li>';
		  $count++;
		}
	}
	$output .= '</ul></div></div>';
  
  $output .= '
		<div class="fs_controls slider_info ribbon_panel">
        <div class="share_block">
            <a href="javascript:void(0)" class="share_toggle">Share</a>
            <div class="share_box">
                <a href="http://www.facebook.com/share.php?u='.$share_link.'" target="_blank" class="share_facebook"><i class="stand_icon icon-facebook-square"></i></a>
            <a href="http://pinterest.com/pin/create/button/?url='.$share_link.'&media='.file_create_url($node->field_portfolio_gallery['und'][0]['uri']).'" target="_blank" class="share_pinterest"><i class="stand_icon icon-pinterest"></i></a>                                                            
            <a href="https://twitter.com/intent/tweet?text='.drupal_get_title().'&url='.$share_link.'" target="_blank" class="share_tweet"><i class="stand_icon icon-twitter"></i></a>
            <a href="https://plus.google.com/share?url='.$share_link.'" target="_blank" class="share_gplus"><i class="icon-google-plus-square"></i></a>
            </div>
        </div>
        <div class="title_wrapper"><h1 class="fs_title">'.$node->title.'</h1><span class="fs_descr"></span></div>
        <div class="fs_controls_append">
            <a href="javascript:void(0)" class="post_info hasContent"></a>
            <a href="javascript:void(0)" class="btn_prev fs_slider_prev"></a>
            <a href="javascript:void(0)" class="btn_next fs_slider_next"></a>
            <a href="javascript:history.back()" class="fs_close"></a>
        </div>
    </div><!-- .fullscreen_content_wrapper --> </div>
  ';
  
	return $output;
}	
	
function portfolio_flow($node) {
	drupal_add_js(drupal_get_path('theme', 'soho') . '/js/portfolio/portfolio-flow.js');
	$count = 1;
	$output = '';
	$output .= '<div class="whaterWheel_content dragme"><div id="whaterwheel" class="true" data-int="3000">';
	if (!empty($node->field_portfolio_gallery)) {
		foreach ($node->field_portfolio_gallery['und'] as $item) {
			
			// If image file does not exist in image style folder, create it.
			if (isset($item['uri']) && !file_exists(image_style_path('soho_portfolio_gallery', $item['uri']))){ 
			  image_style_create_derivative(image_style_load('soho_portfolio_gallery'), $item['uri'], image_style_path('soho_portfolio_gallery', $item['uri']));
			}
			
		  $output .= '<div class="ww_block" id="ww_block'.$count.'" data-count="'.$count.'">';	
		  $output .= '<div class="ww_wrapper"><img alt="" src="'.file_create_url(image_style_path('soho_portfolio_gallery', $item['uri'])).'" /></div>';
		  $output .= '</div>';
		  $count++;
		}
	}
	$output .= '</div></div>';

	return $output;
}

function portfolio_gallery($node) {
  $output = '';
  $output .= '<div class="row portfolio-gallery"><div class="span12"><div class="list-of-images images_in_a_row_3">';
  if (!empty($node->field_portfolio_gallery)) {
		foreach ($node->field_portfolio_gallery['und'] as $item) {
		
		  // If image file does not exist in image style folder, create it.
			if (isset($item['uri']) && !file_exists(image_style_path('soho_portfolio_gallery', $item['uri']))){ 
			  image_style_create_derivative(image_style_load('soho_portfolio_gallery'), $item['uri'], image_style_path('soho_portfolio_gallery', $item['uri']));
			}
		  
			$output .= '
			  <div class="gallery_item">
			    <div class="gallery_item_padding">
	          <div class="gallery_item_wrapper">
	            <a href="'.file_create_url($item['uri']).'" class="prettyPhoto" data-rel="prettyPhoto[gallery1]" title="Portfolio Gallery">
							  <img class="gallery-stand-img" src="'.file_create_url(image_style_path('soho_portfolio_gallery', $item['uri'])).'" alt="Portfolio Gallery">
							  <span class="gallery_fadder"></span>
							  <span class="gallery_ico"><i class="stand_icon icon-eye"></i></span>
							</a>
	          </div>
	        </div>  
			  </div>
			';
		}
	}
	$output .= '</div></div></div>';
	return $output;
}

function portfolio_related_works($nid){
  $count = 1;
  global $base_url;
  $query = new EntityFieldQuery();
	$query
    ->entityCondition('entity_type', 'node')
    ->propertyCondition('status', 1)
    ->entityCondition('bundle', 'portfolio');
  $results = $query->execute();
  $output = '';
  $output .= '<div class="row"><div class="span12 module_cont module_small_padding featured_items single_feature featured_posts">';
  $output .= ' <div class="featured_items"><div class="items3 featured_portfolio"><ul class="item_list">';
  foreach ($results['node'] as $result) {
    if ($count == 4) {
	    break;
    }
    if ($result->nid != $nid) {
      // Load those nodes.
      $item = node_load($result->nid);
      if ( module_exists('statistics')) {
        $stats = statistics_get($result->nid);
        $view_count = $stats['totalcount'];
      }
      
      
      if (isset($item->body['und'])) {
	      $body = substr($item->body['und'][0]['value'], 0, 75);
      }
      else {
	      $body = '';
      }
      
      // Set the $like variable.
      $like = '';
      if (isset($item->field_like['und'])) {
        $like = field_view_field('node', $item, 'field_like');
        $like = drupal_render($like);
      }
      
      $terms = '';
      if (isset($item->field_portfolio_category['und'])) {
	      // Get the portfolio item taxonomy terms.
	      $taxonomy = array();
	      foreach ($item->field_portfolio_category['und'] as $term) {
		      $taxonomy[] = taxonomy_term_load($term['tid'])->name;
	      }
	      $terms = '<div class="preview_categ">'.t('in').' '.implode(', ', $taxonomy).'</div>';
      }
      
	    // If image file does not exist in image style folder, create it.
			if (isset($item->field_image['und']) && !file_exists(image_style_path('soho_related_works', $item->field_image['und'][0]['uri']))){ 
			  image_style_create_derivative(image_style_load('soho_related_works'), $item->field_image['und'][0]['uri'], image_style_path('soho_related_works', $item->field_image['und'][0]['uri']));
			}
			
			isset($item->field_image['und']) ? $image = '<img src="'.file_create_url(image_style_path('soho_related_works', $item->field_image['und'][0]['uri'])).'">' : $image = '' ;
			
			// Start markup output.
	    $output .= '
	    <li>
	      <div class="item">
	        <div class="item_wrapper">
						<div class="img_block wrapped_img">
							<a class="featured_ico_link" href="'.$base_url.'/node/'.$item->vid.'">
								'.$image.'
								<div class="featured_item_fadder"></div>
								<span class="featured_items_ico"></span>
							</a>
						</div>
						
						<div class="featured_items_body">
							<div class="featured_items_title">
								<h5><a href="'.$base_url.'/node/'.$item->vid.'">'.$item->title.'</a></h5>
								<div class="featured_items_meta">
								  <div class="preview_categ">
								    '.$terms.'
								  </div> 
								</div>
							</div>
							<div class="featured_item_content">
								'.$body.'
							</div>	
							<div class="featured_item_footer">
							  <div class="post-views"><i class="stand_icon icon-eye"></i> <span>'. $view_count .'</span></div>
							  <div class="gallery_likes gallery_likes_add ">
							    '.$like.'
								</div>
								<a class="morelink" href="'.$base_url.'/node/'.$item->vid.'">'.t(' Read more').'</a>	
							</div>
					  </div>
				  </div>
			  </div>
			</li>			
			';
		$count ++;	
	  }
	  
  }
  $output .= '</ul></div></div></div></div>';
  return $output;
  
}