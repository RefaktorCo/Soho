<div class="row">
	<div class="span12 first-module module_number_1 module_cont title_square module_text_area pb40">
    <div class="bg_title"><h4 class="headInModule"><?php print $title; ?></h4></div>
    <?php
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_map_coordinates']);
      hide($content['field_contact_form_right']);
      print render($content);
    ?>    
  </div><!-- .module_cont -->
</div>

<div class="row">
  <div class="span6 module_number_2 module_cont pb50 module_html"> 
	  <?php 
	    require_once drupal_get_path('module', 'contact') .'/contact.pages.inc'; 
      $contact_form = drupal_get_form('contact_site_form');
      print drupal_render($contact_form); 
		?>  
  </div>
  <div class="span6 module_number_3 module_cont no_bg module_contact_info pb50">
	  <?php print render($content['field_contact_form_right']); ?>
  </div>	  
</div>	                                        	

<?php if (!empty($content['field_map_coordinates'])): ?>
<!-- Google Maps -->
<div class="row">
  <div class="span12 module_number_4 module_cont pb0 module_google_map">
		<div id="map_section">            	
			<div id="map-canvas"></div>   
		</div>
  </div>
</div>  	


<script>
	function setUpWindow() {
		"use strict";
		main_wrapper.css('min-height', window_h - parseInt(site_wrapper.css('padding-top'), 10) - parseInt(site_wrapper.css('padding-bottom'), 10)+'px');
	}
	jQuery(document).ready(function(){
		"use strict";
		setUpWindow();
	});
	jQuery(window).load(function(){
		"use strict";
		setUpWindow();
	});
	jQuery(window).resize(function(){
		"use strict";
		setUpWindow();
		var setuptimer = setTimeout(function(){
			setUpWindow();
			clearTimeout(setuptimer);
		}, 500);
	});		
</script> 
  
<!-- Google Map -->
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCCqo-F2TnMAABZvfV5yTQLlWvUCJlJViU&amp;sensor=false"></script>
<script>
function initialize() {
	"use strict";
        // Create an array of styles.
        var styles = [
		  {
			"stylers": [
			  { "lightness": 4 },
			  { "saturation": -83 },
			  { "hue": "#0091ff" }
			]
		  },{
			"elementType": "geometry.stroke",
			"stylers": [
			  { "color": "#688080" },
			  { "lightness": 43 }
			]
		  },{
			"elementType": "labels.text.stroke",
			"stylers": [
			  { "visibility": "on" },
			  { "color": "#6c8096" },
			  { "lightness": 100 }
			]
		  },{
			"elementType": "labels.text.fill",
			"stylers": [
			  { "color": "#5e8080" },
			  { "lightness": -26 }
			]
		  },{
			"featureType": "road",
			"elementType": "geometry.stroke",
			"stylers": [
			  { "visibility": "on" },
			  { "lightness": -7 }
			]
		  },{
			"featureType": "road.highway",
			"stylers": [
			  { "lightness": -1 }
			]
		  },{
			"featureType": "road.highway",
			"elementType": "geometry.fill",
			"stylers": [
			  { "lightness": 36 }
			]
		  },{
			"featureType": "transit.line",
			"stylers": [
			  { "color": "#6e8080" },
			  { "lightness": 47 }
			]
		  }
		];
		
		// Create a new StyledMapType object, passing it the array of styles,
		// as well as the name to be displayed on the map type control.
		var styledMap = new google.maps.StyledMapType(styles,
			{name: "Styled Map"});

		// Create a map object, and include the MapTypeId to add
		// to the map type control.
		var mapOptions = {
			zoom: 18,
			center: new google.maps.LatLng(<?php print strip_tags(render($content['field_map_coordinates'])); ?>),
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			}
		};
		var map = new google.maps.Map(document.getElementById('map-canvas'),
			mapOptions);

		//Associate the styled map with the MapTypeId and set it to display.
		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');
	}
	google.maps.event.addDomListener(window, 'load', initialize);            
</script>   

<?php endif; ?>