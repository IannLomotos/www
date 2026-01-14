<?php

    $food_restro_zone_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $food_restro_zone_scroll_position = get_theme_mod( 'food_restro_zone_scroll_top_position','Right');
    if($food_restro_zone_scroll_position == 'Right'){
        $food_restro_zone_theme_css .='#button{';
            $food_restro_zone_theme_css .='right: 20px;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_scroll_position == 'Left'){
        $food_restro_zone_theme_css .='#button{';
            $food_restro_zone_theme_css .='left: 20px;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_scroll_position == 'Center'){
        $food_restro_zone_theme_css .='#button{';
            $food_restro_zone_theme_css .='right: 50%;left: 50%;';
        $food_restro_zone_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $food_restro_zone_footer_widget_heading_alignment = get_theme_mod( 'food_restro_zone_footer_widget_heading_alignment','Left');
    if($food_restro_zone_footer_widget_heading_alignment == 'Left'){
        $food_restro_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $food_restro_zone_theme_css .='text-align: left;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_footer_widget_heading_alignment == 'Center'){
        $food_restro_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $food_restro_zone_theme_css .='text-align: center;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_footer_widget_heading_alignment == 'Right'){
        $food_restro_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $food_restro_zone_theme_css .='text-align: right;';
        $food_restro_zone_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $food_restro_zone_footer_widget_content_alignment = get_theme_mod( 'food_restro_zone_footer_widget_content_alignment','Left');
    if($food_restro_zone_footer_widget_content_alignment == 'Left'){
        $food_restro_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $food_restro_zone_theme_css .='text-align: left;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_footer_widget_content_alignment == 'Center'){
        $food_restro_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $food_restro_zone_theme_css .='text-align: center;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_footer_widget_content_alignment == 'Right'){
        $food_restro_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $food_restro_zone_theme_css .='text-align: right;';
        $food_restro_zone_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $food_restro_zone_copyright_content_alignment = get_theme_mod( 'food_restro_zone_copyright_content_alignment','Center');
    if($food_restro_zone_copyright_content_alignment == 'Left'){
        $food_restro_zone_theme_css .='.footer-menu-left{';
        $food_restro_zone_theme_css .='text-align: left !important;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_copyright_content_alignment == 'Center'){
        $food_restro_zone_theme_css .='.footer-menu-left{';
            $food_restro_zone_theme_css .='text-align: center !important;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_copyright_content_alignment == 'Right'){
        $food_restro_zone_theme_css .='.footer-menu-left{';
            $food_restro_zone_theme_css .='text-align: right !important;';
        $food_restro_zone_theme_css .='}';
    }

    /*---------------------------Width Layout -------------------*/

    $food_restro_zone_width_option = get_theme_mod( 'food_restro_zone_width_option','Full Width');
    if($food_restro_zone_width_option == 'Boxed Width'){
        $food_restro_zone_theme_css .='body{';
            $food_restro_zone_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
        $food_restro_zone_theme_css .='}';
        $food_restro_zone_theme_css .='.scrollup i{';
            $food_restro_zone_theme_css .='right: 100px;';
        $food_restro_zone_theme_css .='}';
        $food_restro_zone_theme_css .='.page-template-custom-home-page .home-page-header{';
            $food_restro_zone_theme_css .='padding: 0px 40px 0 10px;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_width_option == 'Wide Width'){
        $food_restro_zone_theme_css .='body{';
            $food_restro_zone_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
        $food_restro_zone_theme_css .='}';
        $food_restro_zone_theme_css .='.scrollup i{';
            $food_restro_zone_theme_css .='right: 30px;';
        $food_restro_zone_theme_css .='}';
    }else if($food_restro_zone_width_option == 'Full Width'){
        $food_restro_zone_theme_css .='body{';
            $food_restro_zone_theme_css .='max-width: 100%;';
        $food_restro_zone_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $food_restro_zone_nav_menu = get_theme_mod( 'food_restro_zone_nav_menu_text_transform','Capitalize');
    if($food_restro_zone_nav_menu == 'Capitalize'){
        $food_restro_zone_theme_css .='.main-navigation .menu > li > a{';
            $food_restro_zone_theme_css .='text-transform:Capitalize;';
        $food_restro_zone_theme_css .='}';
    }
    if($food_restro_zone_nav_menu == 'Lowercase'){
        $food_restro_zone_theme_css .='.main-navigation .menu > li > a{';
            $food_restro_zone_theme_css .='text-transform:Lowercase;';
        $food_restro_zone_theme_css .='}';
    }
    if($food_restro_zone_nav_menu == 'Uppercase'){
        $food_restro_zone_theme_css .='.main-navigation .menu > li > a{';
            $food_restro_zone_theme_css .='text-transform:Uppercase;';
        $food_restro_zone_theme_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

    $food_restro_zone_global_color = get_theme_mod('food_restro_zone_global_color');

    if($food_restro_zone_global_color != false){
        $food_restro_zone_theme_css .='.comment-respond input#submit,.wp-block-button__link,.main-navigation .sub-menu,.sidebar input[type="submit"], .sidebar button[type="submit"],a.btn-text,#top-slider .owl-carousel .owl-nav .owl-prev, #top-slider .owl-carousel .owl-nav .owl-next,.featured .owl-carousel .owl-nav .owl-prev:hover, .featured .owl-carousel .owl-nav .owl-next:hover,#top-slider,#button, span.onsale, .pro-button a, .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button.alt,.woocommerce a.added_to_cart, .woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .woocommerce .woocommerce-ordering select, .woocommerce-account .woocommerce-MyAccount-navigation ul li, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover, .sidebar h5, .sidebar .tagcloud a:hover, p.wp-block-tag-cloud a:hover,#top-slider .slide-btn a.book-btn, #top-slider .slide-btn a:hover, span.header-btn a, .site-navigation ul.primary-menu.theme-menu li a:hover,.site-navigation .primary-menu ul, #top-slider .owl-dots button.active, #chooseus-section h5, #colophon, .sidebar .widget h2.wp-block-heading{';
            $food_restro_zone_theme_css .='background-color: '.esc_attr($food_restro_zone_global_color).';';
        $food_restro_zone_theme_css .='}';
    }

    if($food_restro_zone_global_color != false){
        $food_restro_zone_theme_css .='a,.main-navigation .menu > li > a:hover,.post-navigation .nav-previous a, .post-navigation .nav-next a, .posts-navigation .nav-previous a, .posts-navigation .nav-next a,.article-box h3.entry-title a,.navbar-brand p,.top-info .social-link a i:hover, .top-info p.location i,.service-icon i, section.featured span.last_slide_head, p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-message::before, .woocommerce-info::before, .widget a:hover, .widget a:focus, .sidebar ul li a:hover, .topbar-text a i, .main-header a:hover{';
            $food_restro_zone_theme_css .='color: '.esc_attr($food_restro_zone_global_color).';';
        $food_restro_zone_theme_css .='}';
    }

    if($food_restro_zone_global_color != false){
        $food_restro_zone_theme_css .='.wp-block-button.is-style-outline .wp-block-button__link,.postcat-name{';
            $food_restro_zone_theme_css .='color: '.esc_attr($food_restro_zone_global_color).' !important;';
        $food_restro_zone_theme_css .='}';
    }

    if($food_restro_zone_global_color != false){
        $food_restro_zone_theme_css .='.wp-block-button.is-style-outline .wp-block-button__link,.button-header a, #top-slider .slide-btn a, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .navigation.pagination .nav-links a.current, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links span.current, .navigation.pagination .nav-links span:hover, #top-slider .slide-btn a.book-btn, #top-slider .slide-btn a:hover, #top-slider .owl-dots button.active, #chooseus-section .about-feature:hover{';
            $food_restro_zone_theme_css .='border-color: '.esc_attr($food_restro_zone_global_color).';';
        $food_restro_zone_theme_css .='}';
    }

    if($food_restro_zone_global_color != false){
        $food_restro_zone_theme_css .='.woocommerce-message, .woocommerce-info{';
            $food_restro_zone_theme_css .='border-top-color: '.esc_attr($food_restro_zone_global_color).';';
        $food_restro_zone_theme_css .='}';
    }

    $food_restro_zone_theme_css .='@media screen and (max-width:1000px) {';
        if($food_restro_zone_global_color != false){
            $food_restro_zone_theme_css .='.toggle-nav i, .sidenav .closebtn{
            background: '.esc_attr($food_restro_zone_global_color).';
            }';
        }
    $food_restro_zone_theme_css .='}';

    /*-------------------- Heading typography -------------------*/

    $food_restro_zone_heading_color = get_theme_mod('food_restro_zone_heading_color');
    $food_restro_zone_heading_font_family = get_theme_mod('food_restro_zone_heading_font_family');
    $food_restro_zone_heading_font_size = get_theme_mod('food_restro_zone_heading_font_size');
    if($food_restro_zone_heading_color != false || $food_restro_zone_heading_font_family != false || $food_restro_zone_heading_font_size != false){
        $food_restro_zone_theme_css .='h1, h2, h3, h4, h5, h6, .navbar-brand h1.site-title, h2.entry-title, h1.entry-title, h2.page-title, #latest_post h2, h2.woocommerce-loop-product__title, #top-slider .slider-inner-box h3, .featured h3.main-heading, .article-box h3.entry-title, .featured h4.main-heading, #colophon h5, .sidebar h5{';
            $food_restro_zone_theme_css .='color: '.esc_attr($food_restro_zone_heading_color).'!important; 
            font-family: '.esc_attr($food_restro_zone_heading_font_family).'!important;
            font-size: '.esc_attr($food_restro_zone_heading_font_size).'px !important;';
        $food_restro_zone_theme_css .='}';
    }

    $food_restro_zone_paragraph_color = get_theme_mod('food_restro_zone_paragraph_color');
    $food_restro_zone_paragraph_font_family = get_theme_mod('food_restro_zone_paragraph_font_family');
    $food_restro_zone_paragraph_font_size = get_theme_mod('food_restro_zone_paragraph_font_size');
    if($food_restro_zone_paragraph_color != false || $food_restro_zone_paragraph_font_family != false || $food_restro_zone_paragraph_font_size != false){
        $food_restro_zone_theme_css .='p, p.site-title, span, .article-box p, ul, li{';
            $food_restro_zone_theme_css .='color: '.esc_attr($food_restro_zone_paragraph_color).'!important; 
            font-family: '.esc_attr($food_restro_zone_paragraph_font_family).'!important;
            font-size: '.esc_attr($food_restro_zone_paragraph_font_size).'px !important;';
        $food_restro_zone_theme_css .='}';
    }

    /*---------------- Logo CSS ----------------------*/
    $food_restro_zone_logo_title_font_size = get_theme_mod( 'food_restro_zone_logo_title_font_size');
    $food_restro_zone_logo_tagline_font_size = get_theme_mod( 'food_restro_zone_logo_tagline_font_size');
    if( $food_restro_zone_logo_title_font_size != '') {
        $food_restro_zone_theme_css .='#masthead .navbar-brand a{';
            $food_restro_zone_theme_css .='font-size: '. $food_restro_zone_logo_title_font_size. 'px;';
        $food_restro_zone_theme_css .='}';
    }
    if( $food_restro_zone_logo_tagline_font_size != '') {
        $food_restro_zone_theme_css .='#masthead .navbar-brand p{';
            $food_restro_zone_theme_css .='font-size: '. $food_restro_zone_logo_tagline_font_size. 'px;';
        $food_restro_zone_theme_css .='}';
    }