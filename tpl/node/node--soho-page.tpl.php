<div class="fullscreen_block fw_background <?php if (render($content['field_soho_page_image'])) {print "bg_image bg1";} else {print "bg_video";} ?> loaded">
	<?php if (render($content['field_soho_page_video'])) {print render($content['field_soho_page_video']);} ?>
</div>
<div class="custom_bg black_bg"></div>

<?php 
if (render($content['field_soho_page_image'])) {
  drupal_add_css(
    '.bg1{background-image: url('. file_create_url($node->field_soho_page_image['und'][0]['uri']) .');}',
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