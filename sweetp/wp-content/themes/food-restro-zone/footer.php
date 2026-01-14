<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Food Restro Zone
 */

do_action('food_restro_zone_before_footer_content_action');
?>

<footer id="colophon" class="site-footer border-top">
    <div class="container">
    	<div class="footer-column">
	      	<div class="row">
		        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
		          	<?php if (is_active_sidebar('food-restro-zone-footer1')) : ?>
                        <?php dynamic_sidebar('food-restro-zone-footer1'); ?>
                    <?php else : ?>
                        <aside id="search" class="widget" role="complementary" aria-label="<?php esc_attr_e( 'firstsidebar', 'food-restro-zone' ); ?>">
                            <h5 class="widget-title"><?php esc_html_e( 'About Us', 'food-restro-zone' ); ?></h5>
                            <div class="textwidget">
                            	<p><?php esc_html_e( 'Nam malesuada nulla nisi, ut faucibus magna congue nec. Ut libero tortor, tempus at auctor in, molestie at nisi. In enim ligula, consequat eu feugiat a.', 'food-restro-zone' ); ?></p>
                            </div>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
		            <?php if (is_active_sidebar('food-restro-zone-footer2')) : ?>
                        <?php dynamic_sidebar('food-restro-zone-footer2'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Useful Links', 'food-restro-zone' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Home', 'food-restro-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Tournaments', 'food-restro-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Reviews', 'food-restro-zone' ); ?></li>
                            	<li><?php esc_html_e( 'About Us', 'food-restro-zone' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
		            <?php if (is_active_sidebar('food-restro-zone-footer3')) : ?>
                        <?php dynamic_sidebar('food-restro-zone-footer3'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Information', 'food-restro-zone' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'FAQ', 'food-restro-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Site Maps', 'food-restro-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Privacy Policy', 'food-restro-zone' ); ?></li>
                            	<li><?php esc_html_e( 'Contact Us', 'food-restro-zone' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-12">
		            <?php if (is_active_sidebar('food-restro-zone-footer4')) : ?>
                        <?php dynamic_sidebar('food-restro-zone-footer4'); ?>
                    <?php else : ?>
                        <aside id="pages" class="widget">
                            <h5 class="widget-title"><?php esc_html_e( 'Get In Touch', 'food-restro-zone' ); ?></h5>
                            <ul class="mt-4">
                            	<li><?php esc_html_e( 'Via Carlo Montù 78', 'food-restro-zone' ); ?><br><?php esc_html_e( '22021 Bellagio CO, Italy', 'food-restro-zone' ); ?></li>
                            	<li><?php esc_html_e( '+11 6254 7855', 'food-restro-zone' ); ?></li>
                            	<li><?php esc_html_e( 'support@example.com', 'food-restro-zone' ); ?></li>
                            </ul>
                        </aside>
                    <?php endif; ?>
		        </div>
	      	</div>
		</div>
    	<?php if (get_theme_mod('food_restro_zone_show_hide_copyright', true)) {?>
	        <div class="site-info">
	            <div class="footer-menu-left text-center">
	            	<?php  if( ! get_theme_mod('food_restro_zone_footer_text_setting') ){ ?>
					    <a target="_blank" href="<?php echo esc_url('https://wordpress.org/'); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'food-restro-zone' ), 'WordPress' );
							?>
					    </a>
					    <span class="sep mr-1"> | </span>

					    <span>
					    	<a href="https://www.themagnifico.net/products/food-restro-zone" target="_blank">
			              		<?php
				                /* translators: 1: Theme name,  */
				                printf( esc_html__( ' %1$s ', 'food-restro-zone' ),'Restro WordPress Theme' );
				              	?>
			              	</a>
				          	<?php
				              /* translators: 1: Theme author. */
				              printf( esc_html__( 'by %1$s.', 'food-restro-zone' ),'TheMagnifico'  );
				            ?>

	        			</span>
					<?php }?>
					<?php echo esc_html(get_theme_mod('food_restro_zone_footer_text_setting')); ?>
	            </div>
	        </div>
		<?php } ?>
	    <?php if(get_theme_mod('food_restro_zone_scroll_hide',true)){ ?>
	    	<a id="button"><?php esc_html_e('TOP','food-restro-zone'); ?></a>
	    <?php } ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>