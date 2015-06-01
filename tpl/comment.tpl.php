<?php
/**
 * @file comment.tpl.php
 * Oyster's comment template.
 */
 
global $parent_root;
?>

<ol class="commentlist">
  <li>
    <div class="stand_comment">
		  <div class="commentava wrapped_img">
		    <?php 
		      if (!$picture) {
		        echo '<img src="'.$parent_root.'/img/anon.png" alt="anon">'; 
		      }
		      else { 
		        print $picture;   
		      }
		    ?>
		  </div>
		  <div class="thiscommentbody">
        
        <div class="comment_box"<?php print $content_attributes; ?>>
		      <div class="row">
		      <?php hide($content['links']); print render($content); ?>
		      </div>
		      <?php if ($signature): ?>
		       <div class="user-signature clearfix">
		         <?php print $signature ?>
		      </div>
		     <?php endif; ?>
		    </div>
		    <div class="comment_info">
			    <div class="listing_meta">
            <span class="post-meta"><?php print $author; ?> </span>
            <span class="post-meta"><?php print format_date($comment->created, 'custom', 'M d, Y'); ?></span>
            <span class="post-meta"><?php if (!empty($content['links'])) { print render($content['links']); } ?></span>
        </div>

      </div>
      <div class="clear"></div>
    </div>  
  </li>
</ol>