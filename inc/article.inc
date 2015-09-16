<?php
	
function article_fullwidth_slider($node) {
	$output = '';
	$output .= '<div class="pf_output_container"><div class="slider-wrapper theme-default"><div class="nivoSlider"> ';
	
	if (!empty($node->field_image)) {
		foreach ($node->field_image['und'] as $item) {		
		  $output .= '<img alt="" src="'.file_create_url($item['uri']).'" />';
		}
  }
  	
	$output .= '</ul></div></div></div>';
	return $output;
}	

function article_related_works($nid){
  $count = '1';
  global $base_url;
  $query = new EntityFieldQuery();
	$query
    ->entityCondition('entity_type', 'node')
    ->propertyCondition('status', 1)
    ->entityCondition('bundle', 'article');
  $results = $query->execute();

  $output = '';
  $output .= '<div class="row"><div class="span12 single_post_module module_cont module_small_padding featured_items single_feature featured_posts">';
  $output .= ' <div class="featured_items"><div class="items3 featured_posts"><ul class="item_list">';
  foreach ($results['node'] as $result) {
    if ($count == 4) {
	    break;
    }
    if ($result->nid != $nid) {
      // Load those nodes.
      $item = node_load($result->nid);
      
      // If image file does not exist in image style folder, create it.
			if (isset($item->field_image['und']) && !file_exists(image_style_path('soho_related_works', $item->field_image['und'][0]['uri']))){ 
			  image_style_create_derivative(image_style_load('soho_related_works'), $item->field_image['und'][0]['uri'], image_style_path('soho_related_works', $item->field_image['und'][0]['uri']));
			}
			// Assign image to $image if available.
      isset($item->field_image['und']) ? $image = '<img src="'.file_create_url(image_style_path('soho_related_works', $item->field_image['und'][0]['uri'])).'">' : $image = '';
      
      if (isset($item->body['und'])) {
	      $body = substr($item->body['und'][0]['value'], 0, 75) .'<a class="morelink" href="'.$base_url.'/node/'.$item->vid.'">'.t(' Read more').'</a>';
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
      
      // Set the $view_count variable.
      
      if ( module_exists('statistics')) {
        $stats = statistics_get($item->nid);
        $view_count = $stats['totalcount'];
      }
            
      // Set the $date variable.
      $date = gmdate("F d, Y", $item->created);
      
      // Set the comment text.
      $item->comment_count == '1' ? $comment = t('comment') : $comment = t('comments');
      
      // Get the portfolio item taxonomy terms.
      $taxonomy = array();
      foreach ($item->field_article_category['und'] as $term) {
	      $taxonomy[] = taxonomy_term_load($term['tid'])->name;
      }
      $terms = implode(', ', $taxonomy);
	    
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
						
						<div class="featured_items_body featured_posts_body">
							<div class="featured_items_title">
								<h5><a href="'.$base_url.'/node/'.$item->vid.'">'.$item->title.'</a></h5>
								<div class="listing_meta">
								  <span class="post-meta">'.$date.'</span>
								  <span class="post-meta"><a href="'.$base_url.'/node/'.$item->vid.'/#comments"> '.$item->comment_count.' '.$comment.'</a> </span>
								</div>
							</div>
							<div class="featured_item_content">
								'.$body.'
							</div>	
						  <div class="featured_item_footer">
						    <div class="post-views"><i class="stand_icon icon-eye"></i> <span>'.$view_count.'</span></div>
								<div class="gallery_likes gallery_likes_add ">
								  '.$like.'
								</div>		
								<a class="morelink" href="'.$base_url.'/node/'.$item->vid.'">Read more</a>									
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