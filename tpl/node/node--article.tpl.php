<?php 
  // Declare $base_url global.
  global $base_url;
  // Require article.inc helper file.
  require_once(drupal_get_path('theme', 'soho').'/inc/article.inc'); 
	// Set $share_image variable for passing as argument to soho_social_share.
	if (isset($content['field_image'])) {
		$share_image = file_create_url($node->field_image['und'][0]['uri']);
	} else{
		$share_image = NULL;
	}
?>

<?php if ($teaser): ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

	<div class="blog_post_preview has_pf <?php if ($teaser) { print 'blog_teaser'; } ?>">
		
	  <div class="preview_top">
		  <div class="preview_title">
			  
			  <?php print render($title_prefix); ?>
		    <?php if ( theme_get_setting('article_meta_title') == '1' ) : ?>
		    <h1<?php print $title_attributes; ?> class="blogpost_title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
		    <?php endif; ?>
		    <?php print render($title_suffix); ?>
		    
		    <div class="listing_meta">
		      <?php if ($display_submitted): ?>
		      <span class="post-meta"><?php print t('by'); ?> <?php print $name; ?></span>   
		      <?php endif; ?> 
		      <?php if ( theme_get_setting('article_meta_date') == '1' ) : ?>
		      <span class="post-meta"><?php print $date; ?></span>
		      <?php endif; ?> 
		      <?php if (!empty($content['field_article_category'])): ?>
          <span class="post-meta"><?php print render($content['field_article_category']); ?></span>
					<?php endif; ?>  
					<?php if ( theme_get_setting('article_meta_comments') == '1' ) : ?>
          <span class="post-meta"><a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> <?php print t('Comment'); ?><?php if ($comment_count != "1" ) { echo "s"; } ?></a></span>
          <?php endif; ?>
		    </div>
		    
		  </div><!-- .preview_title -->  
		  <div class="preview_likes gallery_likes_add">
		  	<?php if (render($content['field_like'])): ?><?php print render($content['field_like']); ?><?php endif; ?>
		  </div>	   
	  </div>
	  <div class="clear"></div>
	 
	    <?php if (render($content['field_image']) && count(field_get_items('node', $node, 'field_image')) == 1 && !isset($content['field_media_embed'])): ?> 
	    <div class="pf_output_container">                                                                
	      <?php print render($content['field_image']); ?>
	    </div>  
	    <?php endif; ?>
	    
	    <?php if (render($content['field_image']) && count(field_get_items('node', $node, 'field_image')) > 1 && !isset($content['field_media_embed'])): ?>
	    <div class="slider-wrapper theme-default ">
	      <div class="nivoSlider">                                                
	        <?php print render($content['field_image']); ?>
	      </div>
	    </div>
	    <?php endif; ?>
    
    <?php if (render($content['field_media_embed'])): ?>
      <div class="pf_output_container"><?php print render($content['field_media_embed']);?></div>
    <?php endif; ?>
    
    <div class="blog_post_content">
	
		  <article class="contentarea"<?php print $content_attributes; ?>>
		    <?php
		      // We hide the comments and links now so that we can render them later.
		      hide($content['comments']);
		      hide($content['links']);
		      hide($content['field_tags']);
		      hide($content['field_like']);
		      hide($content['field_featured_image']);
		      hide($content['field_image']);
		      hide($content['field_media_embed']);
		      hide($content['field_article_layout']);
		      print render($content);
		    ?>
		  </article>
	
			<div class="blog_post-footer">
			  
		    <?php if (!$teaser && module_exists('soho_utilities') && theme_get_setting('article_meta_share') == '1') { print theme('soho_social_share', array('title' => $title, 'link' => $base_url.'/node/'.$nid, 'image' => $share_image)); }?>
		    
		    <?php
			    // Remove the "Add new comment" link on the teaser page or if the comment
			    // form is being displayed on the same page.
			    if ($teaser || !empty($content['comments']['comment_form'])) {
			      unset($content['links']['comment']);
			    }
			    $content['links']['node']['#links']['node-readmore']['attributes']['class'] = 'preview_read_more';
			    // Only display the wrapper div if there are links.
			    $links = render($content['links']);
			    if ($links):
			  ?>
			    <div class="link-wrapper">
			      <?php print $links; ?>
			    </div>
			  <?php endif; ?>
		   		    
		    <div class="clear"></div>
	    </div>
	  </div> 
	         
	  <?php if (!$teaser) { print article_related_works($nid); } ?>
	  
		<?php print render($content['comments']); ?>
	</div>
</div>
<?php endif; ?>
<?php if (!$teaser): ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

	<div class="blog_post_page blog_post_preview has_pf <?php if ($teaser) { print 'blog_teaser'; } ?>">
		
	  <div class="preview_top">
		  <div class="preview_title">
			  
			  <?php print render($title_prefix); ?>
		    <?php if ( theme_get_setting('article_meta_title') == '1' ) : ?>
		    <h1<?php print $title_attributes; ?> class="blogpost_title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1>
		    <?php endif; ?>
		    <?php print render($title_suffix); ?>
		    
		    <div class="listing_meta">
		      <?php if ($display_submitted): ?>
		      <span class="post-meta"><?php print t('by'); ?> <?php print $name; ?></span>   
		      <?php endif; ?> 
		      <?php if ( theme_get_setting('article_meta_date') == '1' ) : ?>
		      <span class="post-meta"><?php print $date; ?></span>
		      <?php endif; ?> 
		      <?php if (!empty($content['field_article_category'])): ?>
          <span class="post-meta"><?php print render($content['field_article_category']); ?></span>
					<?php endif; ?>  
					<?php if ( $node->comment != 0 && theme_get_setting('article_meta_comments') == '1' ) : ?>
          <span class="post-meta"><a href="<?php print $node_url;?>/#comments"><?php print $comment_count; ?> <?php print t('Comment'); ?><?php if ($comment_count != "1" ) { echo "s"; } ?></a></span>
          <?php endif; ?>
		    </div>
		    
		  </div><!-- .preview_title -->  
		  <div class="preview_likes gallery_likes_add">
		  	<?php if (render($content['field_like'])): ?><?php print render($content['field_like']); ?><?php endif; ?>
		  </div>	   
	  </div>
	  <div class="clear"></div>
	  
	   <?php if (!isset($content['field_article_layout']) || (isset($content['field_article_layout']) && $content['field_article_layout']['#items'][0]['value'] == 'simple')): ?>
	  
	    <?php if (render($content['field_image']) && count(field_get_items('node', $node, 'field_image')) == 1 && !isset($content['field_media_embed'])): ?> 
	    <div class="pf_output_container">                                                                
	      <?php print render($content['field_image']); ?>
	    </div>  
	    <?php endif; ?>
	    
	    <?php if (render($content['field_image']) && count(field_get_items('node', $node, 'field_image')) > 1 && !isset($content['field_media_embed'])): ?>
	    <div class="slider-wrapper theme-default ">
	      <div class="nivoSlider">                                                
	        <?php print render($content['field_image']); ?>
	      </div>
	    </div>
	    <?php endif; ?>
    
    <?php endif; ?>
    
    <?php if (render($content['field_media_embed'])): ?>
      <div class="pf_output_container"><?php print render($content['field_media_embed']);?></div>
    <?php endif; ?>
    
    <div class="blog_post_content">
	
		  <article class="contentarea"<?php print $content_attributes; ?>>
		    <?php
		      // We hide the comments and links now so that we can render them later.
		      hide($content['comments']);
		      hide($content['links']);
		      hide($content['field_tags']);
		      hide($content['field_like']);
		      hide($content['field_featured_image']);
		      hide($content['field_image']);
		      hide($content['field_media_embed']);
		      hide($content['field_article_layout']);
		      print render($content);
		    ?>
		  </article>
	
			<div class="blogpost_footer">
			  
		    <?php if (!$teaser && module_exists('soho_utilities') && theme_get_setting('article_meta_share') == '1') { print theme('soho_social_share', array('title' => $title, 'link' => $base_url.'/node/'.$nid, 'image' => $share_image)); }?>
		    
		    <?php if (render($content['field_tags'])): ?>
		    <div class="blogpost_tags">
			    <?php print render($content['field_tags']); ?>
		    </div>
		    <?php endif; ?>
		    
		    <?php
			    // Remove the "Add new comment" link on the teaser page or if the comment
			    // form is being displayed on the same page.
			    if ($teaser || !empty($content['comments']['comment_form'])) {
			      unset($content['links']['comment']['#links']['comment-add']);
			    }
			    $content['links']['node']['#links']['node-readmore']['attributes']['class'] = 'preview_read_more';
			    // Only display the wrapper div if there are links.
			    $links = render($content['links']);
			    if ($links):
			  ?>
			    <div class="link-wrapper">
			      <?php print $links; ?>
			    </div>
			  <?php endif; ?>
		    
		    
		    		    
		    <div class="clear"></div>
	    </div>
	  </div> 
	         
	  <?php if (!$teaser) { print article_related_works($nid); } ?>
	  
		<?php print render($content['comments']); ?>
	</div>
</div>
<?php endif; ?>