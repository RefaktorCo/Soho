<?php
/**
 * @file comment-wrapper.tpl.php
 * Oyster's custom comment wrapper template.
 */
?>
<div id="comments" class="post-block post-comments clearfix <?php print $classes; ?>" <?php print $attributes; ?>>

  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
      <h5 class="postcomment"><?php print $node->comment_count; ?> <?php if ($node->comment_count == 1) { print t('Comment:'); } else { print t('Comments:'); }  ?> </h5>
    	
    <?php print render($title_suffix); ?>
  <?php endif; ?>
  
  <div id="comment-wrapper">
    <?php print render($content['comments']); ?>
  </div>
  <?php if ($node->comment_count != 0): ?>

  <?php endif; ?>

  <?php if ($content['comment_form']): ?>
  <div class="post-block post-leave-comment">
    <section id="comment-form-wrapper">
      <h3 id="reply-title" class="comment-reply-title"><?php print t('Leave a comment!'); ?></h3>
      <?php print render($content['comment_form']); ?>
    </section> <!-- /#comment-form-wrapper -->
  </div>  
  <?php endif; ?>

</div> <!-- /#comments -->