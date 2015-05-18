<?php print $messages; ?>
<header class="main_header">
  <div class="header_wrapper">
  
    <?php if ($page['header_branding']) { print render($page['header_branding']); } ?>
    
    <?php if ($logo || $site_name || $site_slogan): ?>
  	
  	  <?php if ($logo): ?> 
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"></a>
      <?php endif; ?> 
            
      <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan" <?php if ($disable_site_name && $disable_site_slogan) { print ' class="hidden"'; } ?>>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name" <?php if ($disable_site_name) { print ' class="hidden"'; } ?>>
	            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
	          </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
	          <h1 id="site-name" <?php if ($disable_site_name) { print ' class="hidden"'; } ?>>
	            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
	          </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan" <?php if ( ($disable_site_slogan ) ) { print 'class="hidden"'; } if ( (!$disable_site_slogan ) AND ($disable_site_name) ) { print 'class="slogan no-name"'; } else { print 'class="slogan"'; } ?>>
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div> <!-- /#name-and-slogan -->
	    <?php endif; ?>  
        
    <?php endif; ?>  
                       
    <nav>
      <?php if (isset($page['header_menu'])): ?> 
      <div class="menu-main-menu-container">
        <?php print render($page['header_menu']); ?>    	
      </div>
      <?php endif; ?>          
    </nav>     

  </div>
  <div class="clear"></div>
</header>

<?php print render($page['fullscreen']); ?>

<?php if (isset($node) && null !== field_get_items('node', $node, 'field_portfolio_layout') && field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] == 'flow'): ?>
  <?php require_once(drupal_get_path('theme', 'soho').'/inc/portfolio.inc'); print portfolio_flow($node); ?>
<?php endif; ?>

<?php if (isset($node) && null !== field_get_items('node', $node, 'field_portfolio_layout') && field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] == 'ribbon'): ?>
  <?php require_once(drupal_get_path('theme', 'soho').'/inc/portfolio.inc'); print portfolio_ribbon($node); ?>
<?php endif; ?>

<?php if (isset($node) && null !== field_get_items('node', $node, 'field_portfolio_layout') && field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] == 'fullwidth'): ?>
  <?php require_once(drupal_get_path('theme', 'soho').'/inc/portfolio.inc'); print portfolio_fullwidth($node); ?>
<?php endif; ?>

<?php if (isset($node) && null !== field_get_items('node', $node, 'field_portfolio_layout') && $node->field_media_embed
== NULL && field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] == 'fullscreen'): ?>
  <?php require_once(drupal_get_path('theme', 'soho').'/inc/portfolio.inc'); print portfolio_fullscreen_slider($node); ?>
<?php endif; ?>

<?php if (isset($node) && null !== field_get_items('node', $node, 'field_portfolio_layout') && $node->field_media_embed
!= NULL && field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] == 'fullscreen'): ?>
  <?php require_once(drupal_get_path('theme', 'soho').'/inc/portfolio.inc'); print portfolio_fullscreen_video($node); ?>
<?php endif; ?>


<?php if ($page['left_sidebar'] || $page['right_sidebar']): ?><div class="bg_sidebar <?php if ($page['left_sidebar']) { print "is_left-sidebar"; }?> <?php if ($page['right_sidebar']) { print "is_right-sidebar";} ?>"></div><?php endif; ?>  


<?php if (!render($page['fullscreen'])): ?>
<div class="<?php if (isset($node) && null !== field_get_items('node', $node, 'field_portfolio_layout') && (field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] == 'ribbon' || field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] == 'fullscreen')) { print "port_content fw-post"; } else { print "site_wrapper";} ?>">

  <div class="<?php if (isset($node) && null !== field_get_items('node', $node, 'field_portfolio_layout') && (field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] != 'ribbon' || field_get_items('node', $node, 'field_portfolio_layout')[0]['value'] != 'fullscreen')) { print "contnt_block"; } else { print "main_wrapper";} ?>">
    <div class="content_wrapper">
      <div class="container">
        <div class="content_block row <?php if (!$page['left_sidebar'] && $page['right_sidebar']) { print "right-sidebar"; } if ($page['left_sidebar'] && !$page['right_sidebar']) { print "left-sidebar"; } if (!$page['left_sidebar'] && !$page['right_sidebar']) { print "no-sidebar"; } ?>">
	        <div class="fl-container <?php if ($page['right_sidebar']) { print "hasRS"; } ?>">
	          <div class="row">
	            
	            <?php if ($messages): ?>
						    <div id="messages"><div class="section clearfix">
						      
						    </div></div> <!-- /.section, /#messages -->
						  <?php endif; ?>
	            
	            <?php if ($tabs): ?>
				        <div class="tabs">
				          <?php print render($tabs); ?>
				        </div>
				      <?php endif; ?>
				      <?php print render($page['help']); ?>
				      <?php if ($action_links): ?>
				        <ul class="action-links">
				          <?php print render($action_links); ?>
				        </ul>
				      <?php endif; ?>
				      <div id="content" class="posts-block <?php if ($page['left_sidebar']) { print "hasLS"; } ?>">
	              <?php print render($page['content']); ?>
				      </div>
	              
	          
			        <?php if ($page['left_sidebar']): ?>
			        <div class="left-sidebar-block">
			          <?php print render($page['left_sidebar']); ?> 
			        </div>
			        <?php endif; ?>
			        
			      </div>
	        </div><!-- .fl-container -->     
        
	        <?php if ($page['right_sidebar']): ?>
	        <div class="right-sidebar-block">
	          <?php print render($page['right_sidebar']); ?> 
	        </div>
	        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>  
<?php endif; ?>
<?php print render($page['after_content']); ?>  
<?php if (render($page['footer_bottom_left']) || render($page['footer_bottom_right']) || render($page['footer_1']) || render($page['footer_2']) || render($page['footer_3']) || render($page['footer_4'])): ?>          
<footer><!-- .main-wrapper -->
  <div class="footer_wrapper container">
    
    <?php if (render($page['footer_1']) || render($page['footer_2']) || render($page['footer_3']) || render($page['footer_4'])): ?>   
    <div class="row">
      <?php if (render($page['footer_1'])): ?>
      <div class="span3">
        <?php print render($page['footer_1']); ?> 
      </div>
      <?php endif; ?>
      <?php if (render($page['footer_2'])): ?>
      <div class="span3">
        <?php print render($page['footer_2']); ?> 
      </div>
      <?php endif; ?>
      <?php if (render($page['footer_3'])): ?>
      <div class="span3">
        <?php print render($page['footer_3']); ?> 
      </div>
      <?php endif; ?>
      <?php if (render($page['footer_4'])): ?>
      <div class="span3">
        <?php print render($page['footer_4']); ?> 
      </div>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php if (render($page['footer_bottom_left']) || render($page['footer_bottom_right'])): ?>   
    <div class="row">
      <?php if (render($page['footer_bottom_left'])): ?>
      <div class="span6">
        <?php print render($page['footer_bottom_left']); ?> 
      </div>
      <?php endif; ?>
      <?php if (render($page['footer_bottom_right'])): ?>
      <div class="span6">
        <?php print render($page['footer_bottom_right']); ?> 
      </div>
      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
</footer>    
<?php endif; ?>