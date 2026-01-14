(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-food_restro_zone_options-';
		
		// Label
		function food_restro_zone_customizer_label( id, title ) {

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Global Color Setting

			if ( id === 'food_restro_zone_global_color' || id === 'food_restro_zone_heading_color' || id === 'food_restro_zone_paragraph_color') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'food_restro_zone_scroll_hide' || id === 'food_restro_zone_preloader_hide' || id === 'food_restro_zone_sticky_header' || id === 'food_restro_zone_products_per_row' || id === 'food_restro_zone_scroll_top_position' || id === 'food_restro_zone_products_per_row' || id === 'food_restro_zone_width_option' || id === 'food_restro_zone_nav_menu_text_transform')  {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Colors

			if ( id === 'food_restro_zone_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			//  Header
			
			if ( id === 'food_restro_zone_question_url' || id === 'food_restro_zone_email_address' || id === 'food_restro_zone_phone_number' || id === 'food_restro_zone_login_url') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Banner

			if ( id === 'food_restro_zone_slider_section_setting' || id === 'food_restro_zone_contact_form_shortcode' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Products

			if ( id === 'food_restro_zone_activities_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'food_restro_zone_footer_widget_content_alignment' || id === 'food_restro_zone_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Settings

			if ( id === 'food_restro_zone_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Settings

			if ( id === 'food_restro_zone_single_post_page_content' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-food_restro_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

	    // Site Identity
		food_restro_zone_customizer_label( 'custom_logo', 'Logo Setup' );
		food_restro_zone_customizer_label( 'site_icon', 'Favicon' );

		// Global Color Setting
		food_restro_zone_customizer_label( 'food_restro_zone_global_color', 'Global Color' );
		food_restro_zone_customizer_label( 'food_restro_zone_heading_color', 'Heading Typography' );
		food_restro_zone_customizer_label( 'food_restro_zone_paragraph_color', 'Paragraph Typography' );

		// General Setting
		food_restro_zone_customizer_label( 'food_restro_zone_preloader_hide', 'Preloader' );
		food_restro_zone_customizer_label( 'food_restro_zone_scroll_hide', 'Scroll To Top' );
		food_restro_zone_customizer_label( 'food_restro_zone_scroll_top_position', 'Scroll to top Position' );
		food_restro_zone_customizer_label( 'food_restro_zone_products_per_row', 'woocommerce Setting' );
		food_restro_zone_customizer_label( 'food_restro_zone_width_option', 'Site Width Layouts' );
		food_restro_zone_customizer_label( 'food_restro_zone_nav_menu_text_transform', 'Nav Menus Text Transform' );

		// Colors
		food_restro_zone_customizer_label( 'food_restro_zone_theme_color', 'Theme Color' );
		food_restro_zone_customizer_label( 'background_color', 'Colors' );
		food_restro_zone_customizer_label( 'background_image', 'Image' );

		//Header Image
		food_restro_zone_customizer_label( 'header_image', 'Header Image' );

		// Header 
		food_restro_zone_customizer_label( 'food_restro_zone_email_address', 'Email Address' );
		food_restro_zone_customizer_label( 'food_restro_zone_question_url', 'Question URL' );
		food_restro_zone_customizer_label( 'food_restro_zone_phone_number', 'Phone Number' );
		food_restro_zone_customizer_label( 'food_restro_zone_login_url', 'Login URL' );

		//Slider
		food_restro_zone_customizer_label( 'food_restro_zone_slider_section_setting', 'Slider' );
		food_restro_zone_customizer_label( 'food_restro_zone_contact_form_shortcode', 'Contact Form' );

		//Products
		food_restro_zone_customizer_label( 'food_restro_zone_activities_section_setting', 'Flash Sale' );

		//Footer
		food_restro_zone_customizer_label( 'food_restro_zone_footer_widget_content_alignment', 'Footer' );
		food_restro_zone_customizer_label( 'food_restro_zone_show_hide_copyright', 'Copyright' );

		//Post setting
		food_restro_zone_customizer_label( 'food_restro_zone_post_page_title', 'Post Settings' );

		//Single post setting
		food_restro_zone_customizer_label( 'food_restro_zone_single_post_page_content', 'Single Post Settings' );
	

	});

})( jQuery );
