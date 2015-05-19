<?php 
  // MOVE ALL THIS TO PREPROCESS FUNCTION
  // Declare $base_url global.
  global $base_url;
  
	// Set $share_image variable for passing as argument to soho_social_share.
	if (isset($content['field_image'])) {
		$share_image = file_create_url($node->field_image['und'][0]['uri']);
	} else{
		$share_image = NULL;
	}
  require_once(drupal_get_path('theme', 'soho').'/inc/portfolio.inc');
 
?>

<div class="span12 module_cont module_blog module_none_padding module_blog_page">
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  	<div class="blog_post_page blog_post_preview has_pf">
		  <div class="preview_top">
			  
        <div class="preview_title">
	        <?php if ($title): ?>
	        <?php print render($title_prefix); ?>
	        <h1 class="blogpost_title"><?php print $title; ?></h1>
	        <?php print render($title_suffix); ?>    
          <?php endif; ?>
          <div class="listing_meta">
	          <?php if ( theme_get_setting('portfolio_meta_date') == '1' ) : ?>
	          <span><?php print format_date($node->created, 'custom', 'F d, Y'); ?></span>
	          <span class="middot">&middot;</span>
	          <?php endif; ?>
	          <?php if (render($content['field_portfolio_category'])): ?>
	          <span><?php print render($content['field_portfolio_category']); ?></span>
	      	  <?php endif; ?>                                           
	        </div>
        </div>
        
			  <?php if (render($content['field_like'])): ?>
			    <div class="soho-node-like preview_likes gallery_likes_add">
			    <?php print render($content['field_like']); ?>
			    </div>
			  <?php endif; ?>																			
			 
		  
		    <?php if (count(field_get_items('node', $node, 'field_image')) == 1 && !isset($content['field_media_embed'])): ?>                                                                 
		      <?php print render($content['field_image']); ?>
		    <?php endif; ?>
		    
		    <?php if (count(field_get_items('node', $node, 'field_image')) > 1 && !isset($content['field_media_embed'])): ?>     
		                                              	
		    <div class="slider-wrapper theme-default ">
		      <div class="nivoSlider">                                                
		        <?php print render($content['field_image']); ?>
		      </div>
		    </div>
		    <?php endif; ?>
		    
		    <?php if (render($content['field_media_embed'])): ?>
	        <div class="pf_output_container"><?php print render($content['field_media_embed']);?></div>
	      <?php endif; ?>
	 	  </div>   

    <article class="contentarea sp_contentarea">
    
	    <?php if (isset($content['field_portfolio_introduction'])) { print render($content['field_portfolio_introduction']); } ?>
	    	
	    <?php
	      // Hide all other fields and render $content.
	      hide($content['field_image']);
	      hide($content['field_tags']);
	      hide($content['field_portfolio_skills']);
	      hide($content['field_portfolio_gallery']);
	      hide($content['field_media_embed']);
	      hide($content['field_portfolio_introduction']);
	      hide($content['field_portfolio_category']);
	      hide($content['field_portfolio_layout']);
	      hide($content['field_like']);
	      hide($content['comments']);
	      hide($content['links']);
	      print render($content);
	    ?>
	                 
    </article>
	   
	  <div class="blogpost_footer">
		  <?php if (!$teaser && module_exists('soho_utilities') && theme_get_setting('portfolio_meta_share') == '1') { print theme('soho_social_share', array('title' => $title, 'link' => $base_url.'/node/'.$nid, 'image' => $share_image)); }?>
     
     <?php if ($display_submitted): ?>
     <div class="blogpost_author_name">
       <?php print $name; ?>
       <div class="clear"></div>
     </div>
     <?php endif; ?>

		</div> 
	   
  </div><!--.blog_post_page -->           
  
  <?php print portfolio_related_works($nid); ?>

  <?php
    // Remove the "Add new comment" link on the teaser page or if the comment
    // form is being displayed on the same page.
    if ($teaser || !empty($content['comments']['comment_form'])) {
      unset($content['links']['comment']['#links']['comment-add']);
    }
    // Only display the wrapper div if there are links.
    $links = render($content['links']);
    if ($links):
  ?>
    <div class="link-wrapper">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

  </div>
</div>