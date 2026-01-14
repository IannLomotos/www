<?php
/**
 * Displays Top header
 *
 * @package Food Restro Zone
 */
?>
<div class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-8 align-self-center">
				<div class="topbar-text text-md-start text-center">
					<?php if(get_theme_mod('food_restro_zone_question_url') != ''){?>
						<a href="<?php echo esc_url(get_theme_mod('food_restro_zone_question_url')); ?>"><?php echo esc_html('Have any question?', 'food-restro-zone'); ?></a>
					<?php }?>
					<?php if(get_theme_mod('food_restro_zone_email_address') != ''){?>
						<a href="mailto:<?php echo esc_url(get_theme_mod('food_restro_zone_email_address')); ?>"><i class="fas fa-envelope"></i>  <?php echo esc_html(get_theme_mod('food_restro_zone_email_address')); ?></a>
					<?php }?>
					<?php if(get_theme_mod('food_restro_zone_phone_number') != ''){?>
						<a href="tel:<?php echo esc_url(get_theme_mod('food_restro_zone_phone_number')); ?>"><i class="fas fa-phone"></i>  <?php echo esc_html(get_theme_mod('food_restro_zone_phone_number')); ?></a>
					<?php }?>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 align-self-center">
				<div class="current text-md-end text-center">
	                <?php if(class_exists('GTranslate')){ ?>
						<span class="text-center translate-btn">
	                        <?php echo do_shortcode('[gtranslate]');?>
	                	</span>
	                <?php }?>
	                <?php if(class_exists('Alg_WC_Currency_Switcher')){ ?>
	                    <span class="currency">
	                        <?php echo do_shortcode('[woocommerce_currency_switcher_drop_down_box]');?>
	                    </span>
	                <?php }?>
	            </div>
			</div>
		</div>
	</div>
</div>