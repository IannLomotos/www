<?php
/**
 * Displays main header
 *
 * @package Food Restro Zone
 */
?>

<div class="main-header text-center text-md-start">
    <div class="container">
        <div class="row nav-box m-0">
            <div class="col-xl-3 col-lg-3 col-md-4 logo-box align-self-center">
                <div class="navbar-brand ">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $food_restro_zone_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $food_restro_zone_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                                <?php if( get_theme_mod('food_restro_zone_logo_title_text',true) != ''){ ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php } ?>
                            <?php else : ?>
                                <?php if( get_theme_mod('food_restro_zone_logo_title_text',true) != ''){ ?>
                                    <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $food_restro_zone_description = get_bloginfo( 'description', 'display' );
                            if ( $food_restro_zone_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('food_restro_zone_theme_description',false) != ''){ ?>
                            <p class="site-description pb-2"><?php echo esc_html($food_restro_zone_description); ?></p>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-4 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4  align-self-center header-btn text-md-end text-center">
                <?php if(class_exists('woocommerce')){ ?>
                    <span class="cart_no">
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','food-restro-zone' ); ?>"><i class="fas fa-shopping-cart"></i></a>
                    </span>
                    <span class="user-btn mx-3">
                        <a class="account-btn" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','food-restro-zone'); ?>"><i class="fas fa-user"></i></a>
                    </span>
                <?php }?>
                <?php if ( get_theme_mod('food_restro_zone_login_url') != "") {?>
                    <span class="header-btn">
                        <a href="<?php echo esc_url(get_theme_mod('food_restro_zone_login_url')); ?>"><?php echo esc_html('Log In/Sign Up', 'food-restro-zone'); ?></a>
                    </span>
                <?php }?>
            </div>
        </div>
    </div>
</div>
