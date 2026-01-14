<?php

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function food_restro_zone_register_recommended_plugins() {
	$plugins = array(		
		array(
			'name'             => __( 'Currency Switcher for WooCommerce', 'food-restro-zone' ),
			'slug'             => 'currency-switcher-woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'GTranslate', 'food-restro-zone' ),
			'slug'             => 'gtranslate',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		), 
		array(
			'name'             => __( 'WooCommerce', 'food-restro-zone' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'food_restro_zone_register_recommended_plugins' );