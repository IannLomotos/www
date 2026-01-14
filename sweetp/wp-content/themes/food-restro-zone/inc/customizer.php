<?php
/**
 * Food Restro Zone Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Food Restro Zone
 */

if ( ! function_exists( 'food_restro_zone_file_setup' ) ) :

    function food_restro_zone_file_setup() {

        if ( ! defined( 'FOOD_RESTRO_ZONE_URL' ) ) {
            define( 'FOOD_RESTRO_ZONE_URL', esc_url( 'https://www.themagnifico.net/products/restro-wordpress-theme', 'food-restro-zone') );
        }
        if ( ! defined( 'FOOD_RESTRO_ZONE_TEXT' ) ) {
            define( 'FOOD_RESTRO_ZONE_TEXT', __( 'Food Restro Zone Pro','food-restro-zone' ));
        }
        if ( ! defined( 'FOOD_RESTRO_ZONE_BUY_TEXT' ) ) {
            define( 'FOOD_RESTRO_ZONE_BUY_TEXT', __( 'Buy Food Restro Pro','food-restro-zone' ));
        }

    }
endif;
add_action( 'after_setup_theme', 'food_restro_zone_file_setup' );

use WPTRT\Customize\Section\Food_Restro_Zone_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Food_Restro_Zone_Button::class );

    $manager->add_section(
        new Food_Restro_Zone_Button( $manager, 'food_restro_zone_pro', [
            'title'       => esc_html( FOOD_RESTRO_ZONE_TEXT,'food-restro-zone' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'food-restro-zone' ),
            'button_url'  => esc_url( FOOD_RESTRO_ZONE_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'food-restro-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'food-restro-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function food_restro_zone_customize_register($wp_customize){

    // Pro Version
    class Food_Restro_Zone_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( FOOD_RESTRO_ZONE_BUY_TEXT  ,'food-restro-zone' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function food_restro_zone_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('food_restro_zone_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'food-restro-zone' ),
        'section'        => 'title_tagline',
        'settings'       => 'food_restro_zone_logo_title_text',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_restro_zone_logo_title_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'food_restro_zone_sanitize_number_absint'
    ));
    $wp_customize->add_control('food_restro_zone_logo_title_font_size',array(
        'label' => esc_html__('Title Font Size','food-restro-zone'),
        'section' => 'title_tagline',
        'type'    => 'number'
    ));

    $wp_customize->add_setting('food_restro_zone_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'food-restro-zone' ),
        'section'        => 'title_tagline',
        'settings'       => 'food_restro_zone_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_restro_zone_logo_tagline_font_size',array(
        'default'   => '',
        'sanitize_callback' => 'food_restro_zone_sanitize_number_absint'
    ));
    $wp_customize->add_control('food_restro_zone_logo_tagline_font_size',array(
        'label' => esc_html__('Tagline Font Size','food-restro-zone'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    //Logo
    $wp_customize->add_setting('food_restro_zone_logo_max_height',array(
        'default'   => '200',
        'sanitize_callback' => 'food_restro_zone_sanitize_number_absint'
    ));
    $wp_customize->add_control('food_restro_zone_logo_max_height',array(
        'label' => esc_html__('Logo Width','food-restro-zone'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    // Global Color Settings
     $wp_customize->add_section('food_restro_zone_global_color_settings',array(
        'title' => esc_html__('Global Settings','food-restro-zone'),
        'priority'   => 28,
    ));

    $wp_customize->add_setting( 'food_restro_zone_global_color', array(
        'default' => '#FE7700',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_restro_zone_global_color', array(
        'description' => __('Change the global color of the theme in one click.', 'food-restro-zone'),
        'section' => 'food_restro_zone_global_color_settings',
        'settings' => 'food_restro_zone_global_color',
    )));

    //Typography option
    $food_restro_zone_font_array = array(
        ''                       => 'No Fonts',
        'Abril Fatface'          => 'Abril Fatface',
        'Acme'                   => 'Acme',
        'Anton'                  => 'Anton',
        'Architects Daughter'    => 'Architects Daughter',
        'Arimo'                  => 'Arimo',
        'Arsenal'                => 'Arsenal',
        'Arvo'                   => 'Arvo',
        'Alegreya'               => 'Alegreya',
        'Alfa Slab One'          => 'Alfa Slab One',
        'Averia Serif Libre'     => 'Averia Serif Libre',
        'Bangers'                => 'Bangers',
        'Boogaloo'               => 'Boogaloo',
        'Bad Script'             => 'Bad Script',
        'Bitter'                 => 'Bitter',
        'Bree Serif'             => 'Bree Serif',
        'BenchNine'              => 'BenchNine',
        'Cabin'                  => 'Cabin',
        'Cardo'                  => 'Cardo',
        'Courgette'              => 'Courgette',
        'Cherry Swash'           => 'Cherry Swash',
        'Cormorant Garamond'     => 'Cormorant Garamond',
        'Crimson Text'           => 'Crimson Text',
        'Cuprum'                 => 'Cuprum',
        'Cookie'                 => 'Cookie',
        'Chewy'                  => 'Chewy',
        'Days One'               => 'Days One',
        'Dosis'                  => 'Dosis',
        'Droid Sans'             => 'Droid Sans',
        'Economica'              => 'Economica',
        'Fredoka One'            => 'Fredoka One',
        'Fjalla One'             => 'Fjalla One',
        'Francois One'           => 'Francois One',
        'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
        'Gloria Hallelujah'      => 'Gloria Hallelujah',
        'Great Vibes'            => 'Great Vibes',
        'Handlee'                => 'Handlee',
        'Hammersmith One'        => 'Hammersmith One',
        'Inconsolata'            => 'Inconsolata',
        'Indie Flower'           => 'Indie Flower',
        'IM Fell English SC'     => 'IM Fell English SC',
        'Julius Sans One'        => 'Julius Sans One',
        'Josefin Slab'           => 'Josefin Slab',
        'Josefin Sans'           => 'Josefin Sans',
        'Kanit'                  => 'Kanit',
        'Lobster'                => 'Lobster',
        'Lato'                   => 'Lato',
        'Lora'                   => 'Lora',
        'Libre Baskerville'      => 'Libre Baskerville',
        'Lobster Two'            => 'Lobster Two',
        'Merriweather'           => 'Merriweather',
        'Monda'                  => 'Monda',
        'Montserrat'             => 'Montserrat',
        'Muli'                   => 'Muli',
        'Marck Script'           => 'Marck Script',
        'Noto Serif'             => 'Noto Serif',
        'Open Sans'              => 'Open Sans',
        'Overpass'               => 'Overpass',
        'Overpass Mono'          => 'Overpass Mono',
        'Oxygen'                 => 'Oxygen',
        'Orbitron'               => 'Orbitron',
        'Patua One'              => 'Patua One',
        'Pacifico'               => 'Pacifico',
        'Padauk'                 => 'Padauk',
        'Playball'               => 'Playball',
        'Playfair Display'       => 'Playfair Display',
        'PT Sans'                => 'PT Sans',
        'Philosopher'            => 'Philosopher',
        'Permanent Marker'       => 'Permanent Marker',
        'Poiret One'             => 'Poiret One',
        'Quicksand'              => 'Quicksand',
        'Quattrocento Sans'      => 'Quattrocento Sans',
        'Raleway'                => 'Raleway',
        'Rubik'                  => 'Rubik',
        'Roboto'                 => 'Roboto',
        'Rokkitt'                => 'Rokkitt',
        'Russo One'              => 'Russo One',
        'Righteous'              => 'Righteous',
        'Slabo'                  => 'Slabo',
        'Source Sans Pro'        => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light'     => 'Shadows Into Light',
        'Sacramento'             => 'Sacramento',
        'Shrikhand'              => 'Shrikhand',
        'Tangerine'              => 'Tangerine',
        'Ubuntu'                 => 'Ubuntu',
        'VT323'                  => 'VT323',
        'Varela Round'           => 'Varela Round',
        'Vampiro One'            => 'Vampiro One',
        'Vollkorn'               => 'Vollkorn',
        'Volkhov'                => 'Volkhov',
        'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
    );

    // Heading Typography
    $wp_customize->add_setting( 'food_restro_zone_heading_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_restro_zone_heading_color', array(
        'label' => __('Heading Color', 'food-restro-zone'),
        'section' => 'food_restro_zone_global_color_settings',
        'settings' => 'food_restro_zone_heading_color',
    )));

    $wp_customize->add_setting('food_restro_zone_heading_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices',
    ));
    $wp_customize->add_control( 'food_restro_zone_heading_font_family', array(
        'section' => 'food_restro_zone_global_color_settings',
        'label'   => __('Heading Fonts', 'food-restro-zone'),
        'type'    => 'select',
        'choices' => $food_restro_zone_font_array,
    ));

    $wp_customize->add_setting('food_restro_zone_heading_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_heading_font_size',array(
        'label' => esc_html__('Heading Font Size','food-restro-zone'),
        'section' => 'food_restro_zone_global_color_settings',
        'setting' => 'food_restro_zone_heading_font_size',
        'type'  => 'text'
    ));

    // Paragraph Typography
    $wp_customize->add_setting( 'food_restro_zone_paragraph_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_restro_zone_paragraph_color', array(
        'label' => __('Paragraph Color', 'food-restro-zone'),
        'section' => 'food_restro_zone_global_color_settings',
        'settings' => 'food_restro_zone_paragraph_color',
    )));

    $wp_customize->add_setting('food_restro_zone_paragraph_font_family', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices',
    ));
    $wp_customize->add_control( 'food_restro_zone_paragraph_font_family', array(
        'section' => 'food_restro_zone_global_color_settings',
        'label'   => __('Paragraph Fonts', 'food-restro-zone'),
        'type'    => 'select',
        'choices' => $food_restro_zone_font_array,
    ));

    $wp_customize->add_setting('food_restro_zone_paragraph_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_paragraph_font_size',array(
        'label' => esc_html__('Paragraph Font Size','food-restro-zone'),
        'section' => 'food_restro_zone_global_color_settings',
        'setting' => 'food_restro_zone_paragraph_font_size',
        'type'  => 'text'
    ));

    // Post Layouts Settings
     $wp_customize->add_section('food_restro_zone_post_layouts_settings',array(
        'title' => esc_html__('Post Layouts Settings','food-restro-zone'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('food_restro_zone_post_layout',array(
        'default' => 'pattern_two_column_right',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices'
    ));
    $wp_customize->add_control(new Food_Restro_Zone_Image_Radio_Control($wp_customize, 'food_restro_zone_post_layout', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','food-restro-zone'),
        'section' => 'food_restro_zone_post_layouts_settings',
        'choices' => array(
            'pattern_one_column' => esc_url(get_template_directory_uri()).'/assets/img/1column.png',
            'pattern_two_column_right' => esc_url(get_template_directory_uri()).'/assets/img/right-sidebar.png',
            'pattern_two_column_left' => esc_url(get_template_directory_uri()).'/assets/img/left-sidebar.png',
            'pattern_three_column' => esc_url(get_template_directory_uri()).'/assets/img/3column.png',
            'pattern_four_column' => esc_url(get_template_directory_uri()).'/assets/img/4column.png',
            'pattern_grid_post' => esc_url(get_template_directory_uri()).'/assets/img/grid.png',
    ))
    ));

    // General Settings
     $wp_customize->add_section('food_restro_zone_general_settings',array(
        'title' => esc_html__('General Settings','food-restro-zone'),
        'priority'   => 30,
    ));

     $wp_customize->add_setting('food_restro_zone_width_option',array(
        'default' => 'Full Width',
        'transport' => 'refresh',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices'
    ));
    $wp_customize->add_control('food_restro_zone_width_option',array(
        'type' => 'select',
        'section' => 'food_restro_zone_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','food-restro-zone'),
            'Wide Width' => __('Wide Width','food-restro-zone'),
            'Boxed Width' => __('Boxed Width','food-restro-zone')
        ),
    ) );

    $wp_customize->add_setting('food_restro_zone_nav_menu_text_transform',array(
        'default'=> 'Capitalize',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices'
    ));
    $wp_customize->add_control('food_restro_zone_nav_menu_text_transform',array(
        'type' => 'radio',
        'choices' => array(
            'Uppercase' => __('Uppercase','food-restro-zone'),
            'Capitalize' => __('Capitalize','food-restro-zone'),
            'Lowercase' => __('Lowercase','food-restro-zone'),
        ),
        'section'=> 'food_restro_zone_general_settings',
    ));

    $wp_customize->add_setting('food_restro_zone_preloader_hide', array(
        'default' => 0,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'food-restro-zone' ),
        'section'        => 'food_restro_zone_general_settings',
        'settings'       => 'food_restro_zone_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'food_restro_zone_preloader_bg_color', array(
        'default' => '#FE7700',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_restro_zone_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','food-restro-zone'),
        'section' => 'food_restro_zone_general_settings',
        'settings' => 'food_restro_zone_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'food_restro_zone_preloader_dot_1_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_restro_zone_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','food-restro-zone'),
        'section' => 'food_restro_zone_general_settings',
        'settings' => 'food_restro_zone_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'food_restro_zone_preloader_dot_2_color', array(
        'default' => '#222222',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_restro_zone_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','food-restro-zone'),
        'section' => 'food_restro_zone_general_settings',
        'settings' => 'food_restro_zone_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('food_restro_zone_scroll_hide', array(
        'default' => true,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'food-restro-zone' ),
        'section'        => 'food_restro_zone_general_settings',
        'settings'       => 'food_restro_zone_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_restro_zone_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices'
    ));
    $wp_customize->add_control('food_restro_zone_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'food_restro_zone_general_settings',
        'choices' => array(
            'Right' => __('Right','food-restro-zone'),
            'Left' => __('Left','food-restro-zone'),
            'Center' => __('Center','food-restro-zone')
        ),
    ) );

    $wp_customize->add_setting( 'food_restro_zone_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_restro_zone_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','food-restro-zone'),
        'section' => 'food_restro_zone_general_settings',
        'settings' => 'food_restro_zone_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'food_restro_zone_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'food_restro_zone_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','food-restro-zone'),
        'section' => 'food_restro_zone_general_settings',
        'settings' => 'food_restro_zone_scroll_color'
    )));

    $wp_customize->add_setting('food_restro_zone_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','food-restro-zone'),
        'description' => __('Put in px','food-restro-zone'),
        'section'   => 'food_restro_zone_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('food_restro_zone_scroll_border_radius',array(
        'default'   => '0',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_scroll_border_radius',array(
        'label' => __('Scroll Top Border Radius','food-restro-zone'),
        'description' => __('Put in %','food-restro-zone'),
        'section'   => 'food_restro_zone_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting( 'food_restro_zone_products_per_row' , array(
       'default'           => '3',
       'transport'         => 'refresh',
       'sanitize_callback' => 'food_restro_zone_sanitize_select',
    ) );

    $wp_customize->add_control('food_restro_zone_products_per_row', array(
       'label' => __( 'Product per row', 'food-restro-zone' ),
       'section'  => 'food_restro_zone_general_settings',
       'type'     => 'select',
       'choices'  => array(
           '2' => '2',
           '3' => '3',
           '4' => '4',
       ),
    ) );

    $wp_customize->add_setting('food_restro_zone_product_per_page',array(
        'default'   => '9',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_product_per_page',array(
        'label' => __('Product per page','food-restro-zone'),
        'section'   => 'food_restro_zone_general_settings',
        'type'      => 'number'
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number_per_row',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number_per_row',array(
        'label'       => esc_html__('Related Products Column Count', 'food-restro-zone'),
        'section'     => 'food_restro_zone_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 4,
        ),
    ));

    // Product Columns
    $wp_customize->add_setting('custom_related_products_number',array(
        'default'           => '3',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('custom_related_products_number',array(
        'label'       => esc_html__('Number of Related Products Per Page', 'food-restro-zone'),
        'section'     => 'food_restro_zone_general_settings',
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 10,
        ),
    ));

    $wp_customize->add_setting('food_restro_zone_related_product_display_setting', array(
        'default' => true,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_related_product_display_setting',array(
        'label'          => __( 'Show Related Products', 'food-restro-zone' ),
        'section'        => 'food_restro_zone_general_settings',
        'settings'       => 'food_restro_zone_related_product_display_setting',
        'type'           => 'checkbox',
    )));

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('food_restro_zone_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'food-restro-zone' ),
        'section'        => 'food_restro_zone_general_settings',
        'settings'       => 'food_restro_zone_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_restro_zone_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices'
    ));
    $wp_customize->add_control('food_restro_zone_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','food-restro-zone'),
        'section' => 'food_restro_zone_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','food-restro-zone'),
            'Right Sidebar' => __('Right Sidebar','food-restro-zone'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('food_restro_zone_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'food-restro-zone' ),
        'section'        => 'food_restro_zone_general_settings',
        'settings'       => 'food_restro_zone_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_restro_zone_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices'
    ));
    $wp_customize->add_control('food_restro_zone_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','food-restro-zone'),
        'section' => 'food_restro_zone_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','food-restro-zone'),
            'Right Sidebar' => __('Right Sidebar','food-restro-zone'),
        ),
    ) );

    //404 Page Settings
    $wp_customize->add_section('food_restro_zone_404_page_settings',array(
        'title' => esc_html__(' 404 Page Settings','food-restro-zone')
    ));

    $wp_customize->add_setting('food_restro_zone_404_page_main_heading',array(
        'default'           => __( 'Oops! Page Not Found', 'food-restro-zone' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_404_page_main_heading',array(
        'label' => esc_html__('404 Main Heading','food-restro-zone'),
        'section' => 'food_restro_zone_404_page_settings',
        'setting' => 'food_restro_zone_404_page_main_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_404_page_content_1',array(
        'default'           => __( 'We can’t seem to find the page you’re looking for.', 'food-restro-zone' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_404_page_content_1',array(
        'label' => esc_html__('404 Main Content 1','food-restro-zone'),
        'section' => 'food_restro_zone_404_page_settings',
        'setting' => 'food_restro_zone_404_page_content_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_404_page_text_1',array(
        'default'           => __( 'It looks like nothing was found at this location.', 'food-restro-zone' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_404_page_text_1',array(
        'label' => esc_html__('404 Text 1','food-restro-zone'),
        'section' => 'food_restro_zone_404_page_settings',
        'setting' => 'food_restro_zone_404_page_text_1',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_404_page_content_2',array(
        'default'           => __( 'Need Help?', 'food-restro-zone' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_404_page_content_2',array(
        'label' => esc_html__('404 Main Content 2','food-restro-zone'),
        'section' => 'food_restro_zone_404_page_settings',
        'setting' => 'food_restro_zone_404_page_content_2',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_404_page_text_2',array(
        'default'           => __( 'Try searching for what you need below.', 'food-restro-zone' ),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_404_page_text_2',array(
        'label' => esc_html__('404 Text 2','food-restro-zone'),
        'section' => 'food_restro_zone_404_page_settings',
        'setting' => 'food_restro_zone_404_page_text_2',
        'type'  => 'text'
    ));

    //Top Header
    $wp_customize->add_section('food_restro_zone_top_header',array(
        'title' => esc_html__(' Header Option','food-restro-zone')
    ));

    $wp_customize->add_setting('food_restro_zone_question_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_restro_zone_question_url',array(
        'label' => esc_html__('Question URL','food-restro-zone'),
        'section' => 'food_restro_zone_top_header',
        'setting' => 'food_restro_zone_question_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('food_restro_zone_email_address',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_email_address',array(
        'label' => esc_html__('Email Address','food-restro-zone'),
        'section' => 'food_restro_zone_top_header',
        'setting' => 'food_restro_zone_email_address',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_phone_number',array(
        'label' => esc_html__('Phone Number','food-restro-zone'),
        'section' => 'food_restro_zone_top_header',
        'setting' => 'food_restro_zone_phone_number',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_login_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_restro_zone_login_url',array(
        'label' => esc_html__('Login Button URL','food-restro-zone'),
        'section' => 'food_restro_zone_top_header',
        'setting' => 'food_restro_zone_login_url',
        'type'  => 'url'
    ));

    //Banner
    $wp_customize->add_section('food_restro_zone_top_slider',array(
        'title' => esc_html__('Slider Settings','food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_slider_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_slider_section_setting',array(
        'label'    => __( 'Show Slider', 'food-restro-zone' ),
        'section'  => 'food_restro_zone_top_slider',
        'settings' => 'food_restro_zone_slider_section_setting',
        'type'     => 'checkbox',
    )));

    for ( $food_restro_zone_count = 1; $food_restro_zone_count <= 3; $food_restro_zone_count++ ) {

        $wp_customize->add_setting( 'food_restro_zone_top_slider_page' . $food_restro_zone_count, array(
            'default'           => '',
            'sanitize_callback' => 'food_restro_zone_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'food_restro_zone_top_slider_page' . $food_restro_zone_count, array(
            'label'    => __( 'Select Slide Page', 'food-restro-zone' ),
            'section'  => 'food_restro_zone_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('food_restro_zone_banner_btn2_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_banner_btn2_text',array(
        'label' => esc_html__('Book Table Button Text','food-restro-zone'),
        'section' => 'food_restro_zone_top_slider',
        'setting' => 'food_restro_zone_banner_btn2_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_banner_btn2_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('food_restro_zone_banner_btn2_url',array(
        'label' => esc_html__('Book Table Button URL','food-restro-zone'),
        'section' => 'food_restro_zone_top_slider',
        'setting' => 'food_restro_zone_banner_btn2_url',
        'type'  => 'url'
    ));

    //Popular Classes Section
    $wp_customize->add_section('food_restro_zone_choose_us_section',array(
        'title' => esc_html__('Choose Us Section','food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_choose_section_setting', array(
        'default' => false,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'food_restro_zone_choose_section_setting',array(
        'label'          => __( 'Show Choose Us Section', 'food-restro-zone' ),
        'section'        => 'food_restro_zone_choose_us_section',
        'settings'       => 'food_restro_zone_choose_section_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('food_restro_zone_choose_short_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_choose_short_heading',array(
        'label' => esc_html__('Short Heading','food-restro-zone'),
        'section' => 'food_restro_zone_choose_us_section',
        'setting' => 'food_restro_zone_choose_short_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_choose_heading',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_choose_heading',array(
        'label' => esc_html__('Heading','food-restro-zone'),
        'section' => 'food_restro_zone_choose_us_section',
        'setting' => 'food_restro_zone_choose_heading',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('food_restro_zone_choose_content',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('food_restro_zone_choose_content',array(
        'label' => esc_html__('Content','food-restro-zone'),
        'section' => 'food_restro_zone_choose_us_section',
        'setting' => 'food_restro_zone_choose_content',
        'type'  => 'text'
    ));

    for ( $food_restro_zone_count = 1; $food_restro_zone_count <= 4; $food_restro_zone_count++ ) {

        $wp_customize->add_setting('food_restro_zone_featured_icon'.$food_restro_zone_count,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('food_restro_zone_featured_icon'.$food_restro_zone_count,array(
            'label' => esc_html__('Featured Icon ','food-restro-zone'),
            'section' => 'food_restro_zone_choose_us_section',
            'setting' => 'food_restro_zone_featured_icon'.$food_restro_zone_count,
            'type'  => 'text',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-truck-moving','food-restro-zone')
        ));

        $wp_customize->add_setting('food_restro_zone_featured_title'.$food_restro_zone_count,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('food_restro_zone_featured_title'.$food_restro_zone_count,array(
            'label' => esc_html__('Featured Title ','food-restro-zone'),
            'section' => 'food_restro_zone_choose_us_section',
            'setting' => 'food_restro_zone_featured_title'.$food_restro_zone_count,
            'type'  => 'text'
        ));
    }

    $wp_customize->add_setting('food_restro_zone_choose_image1',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'food_restro_zone_choose_image1',array(
        'label' => __('Choose Us Image 1','food-restro-zone'),
        'section' => 'food_restro_zone_choose_us_section',
        'settings' => 'food_restro_zone_choose_image1',
    )));

    $wp_customize->add_setting('food_restro_zone_choose_image2',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'food_restro_zone_choose_image2',array(
        'label' => __('Choose Us Image 2','food-restro-zone'),
        'section' => 'food_restro_zone_choose_us_section',
        'settings' => 'food_restro_zone_choose_image2',
    )));

    // Post Settings
     $wp_customize->add_section('food_restro_zone_post_settings',array(
        'title' => esc_html__('Post Settings','food-restro-zone'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('food_restro_zone_post_page_title',array(
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_restro_zone_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'food-restro-zone'),
        'section'     => 'food_restro_zone_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_post_page_meta',array(
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_restro_zone_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'food-restro-zone'),
        'section'     => 'food_restro_zone_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_post_page_thumb',array(
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_restro_zone_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'food-restro-zone'),
        'section'     => 'food_restro_zone_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_post_page_content',array(
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_restro_zone_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'food-restro-zone'),
        'section'     => 'food_restro_zone_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_post_page_excerpt_length',array(
        'sanitize_callback' => 'food_restro_zone_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('food_restro_zone_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'food-restro-zone'),
        'section'     => 'food_restro_zone_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('food_restro_zone_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('food_restro_zone_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'food-restro-zone'),
        'section'     => 'food_restro_zone_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_post_page_pagination',array(
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_restro_zone_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'food-restro-zone'),
        'section'     => 'food_restro_zone_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_single_post_page_content',array(
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('food_restro_zone_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'food-restro-zone'),
        'section'     => 'food_restro_zone_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'food-restro-zone'),
    ));

    
    // Footer
    $wp_customize->add_section('food_restro_zone_site_footer_section', array(
        'title' => esc_html__('Footer', 'food-restro-zone'),
    ));

    $wp_customize->add_setting('food_restro_zone_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices'
    ));
    $wp_customize->add_control('food_restro_zone_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','food-restro-zone'),
        'section' => 'food_restro_zone_site_footer_section',
        'choices' => array(
            'Left' => __('Left','food-restro-zone'),
            'Center' => __('Center','food-restro-zone'),
            'Right' => __('Right','food-restro-zone')
        ),
    ) );

    $wp_customize->add_setting('food_restro_zone_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'food_restro_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control('food_restro_zone_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','food-restro-zone'),
        'section' => 'food_restro_zone_site_footer_section',
    ));

    $wp_customize->add_setting('food_restro_zone_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('food_restro_zone_footer_text_setting', array(
        'label' => __('Replace the footer text', 'food-restro-zone'),
        'section' => 'food_restro_zone_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('food_restro_zone_copyright_content_alignment',array(
        'default' => 'Center',
        'transport' => 'refresh',
        'sanitize_callback' => 'food_restro_zone_sanitize_choices'
    ));
    $wp_customize->add_control('food_restro_zone_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','food-restro-zone'),
        'section' => 'food_restro_zone_site_footer_section',
        'choices' => array(
            'Left' => __('Left','food-restro-zone'),
            'Center' => __('Center','food-restro-zone'),
            'Right' => __('Right','food-restro-zone')
        ),
    ) );

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'food_restro_zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Food_Restro_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'food_restro_zone_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'food-restro-zone' ),
        'description' => esc_url( FOOD_RESTRO_ZONE_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'food_restro_zone_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function food_restro_zone_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function food_restro_zone_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function food_restro_zone_customize_preview_js(){
    wp_enqueue_script('food-restro-zone-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'food_restro_zone_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function food_restro_zone_panels_js() {
    wp_enqueue_style( 'food-restro-zone-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'food-restro-zone-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'food_restro_zone_panels_js' );