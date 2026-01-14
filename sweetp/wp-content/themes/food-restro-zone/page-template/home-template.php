<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <?php if (get_theme_mod('food_restro_zone_slider_section_setting', false) != '') { ?>
    <section id="top-slider">
      <?php $food_restro_zone_slide_pages = array();
      for ( $food_restro_zone_count = 1; $food_restro_zone_count <= 3; $food_restro_zone_count++ ) {
        $food_restro_zone_mod = intval( get_theme_mod( 'food_restro_zone_top_slider_page' . $food_restro_zone_count ));
        if ( 'page-none-selected' != $food_restro_zone_mod ) {
          $food_restro_zone_slide_pages[] = $food_restro_zone_mod;
        }
      }
      if( !empty($food_restro_zone_slide_pages) ) :
        $food_restro_zone_args = array(
          'post_type' => 'page',
          'post__in' => $food_restro_zone_slide_pages,
          'orderby' => 'post__in'
        );
        $food_restro_zone_query = new WP_Query( $food_restro_zone_args );
        if ( $food_restro_zone_query->have_posts() ) :
          $i = 1;?>
          <div class="owl-carousel" role="listbox">
            <?php  while ( $food_restro_zone_query->have_posts() ) : $food_restro_zone_query->the_post(); ?>
              <div class="slider-box">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                  } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/slider.png" alt="" />
                <?php } ?>
                <div class="slider-inner-box">
                  <h2 class="mb-3"><?php echo wp_trim_words(get_the_title(), 4, '...'); ?></h2>
                  <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('food_restro_zone_slider_excerpt_length', 25)) ); ?></p>
                  <div class="slide-btn mt-4">
                    <?php if(get_theme_mod('food_restro_zone_banner_btn2_text') != '' || get_theme_mod('food_restro_zone_banner_btn2_url') != ''){ ?>
                      <a href="<?php echo esc_url(get_theme_mod('food_restro_zone_banner_btn2_url')); ?>" class="book-btn me-2"><?php esc_html_e(get_theme_mod('food_restro_zone_banner_btn2_text')); ?></a>
                    <?php }?>
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Explore Menu','food-restro-zone'); ?></a>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile;
            wp_reset_postdata();?>
          </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;?>
    </section>
  <?php }?>

  <?php if (get_theme_mod('food_restro_zone_choose_section_setting', false) != '') { ?>
    <section id="chooseus-section" class="py-5 my-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6 align-self-center">
            <?php if(get_theme_mod('food_restro_zone_choose_short_heading') != ''){ ?>
              <h5 class="mb-5"><?php echo esc_html(get_theme_mod('food_restro_zone_choose_short_heading')); ?></h5>
            <?php }?>
            <?php if(get_theme_mod('food_restro_zone_choose_heading') != ''){ ?>
              <h3 class="main-heading mb-3"><?php echo esc_html(get_theme_mod('food_restro_zone_choose_heading')); ?></h3>
            <?php }?>
            <?php if(get_theme_mod('food_restro_zone_choose_content') != ''){ ?>
              <p class="main-content mb-4"><?php echo esc_html(get_theme_mod('food_restro_zone_choose_content')); ?></p>
            <?php }?>
            <div class="feature-box">
              <div class="row">
                <?php for ($i=1; $i <= 4 ; $i++) { ?>
                  <div class="col-lg-6 col-md-6">
                    <div class="about-feature">
                      <?php if(get_theme_mod('food_restro_zone_featured_icon'.$i) != '') {?>
                        <i class="<?php echo esc_attr(get_theme_mod('food_restro_zone_featured_icon'.$i)); ?>"></i>
                      <?php }?>
                      <?php if(get_theme_mod('food_restro_zone_featured_title'.$i) != '') {?>
                        <h6><?php echo esc_html(get_theme_mod('food_restro_zone_featured_title'.$i)); ?></h6>
                      <?php }?>
                    </div>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-6 align-self-center image-box ps-lg-5">
            <?php if (get_theme_mod('food_restro_zone_choose_image1') != '') {?>
              <img src="<?php echo esc_url(get_theme_mod('food_restro_zone_choose_image1'));?>"/>
            <?php } else {?>
              <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/choose1.png"/>
            <?php }?>
            <?php if (get_theme_mod('food_restro_zone_choose_image2') != '') {?>
              <div class="right-image text-end">
                <img src="<?php echo esc_url(get_theme_mod('food_restro_zone_choose_image2'));?>"/>
              </div>
            <?php } else {?>
              <div class="right-image text-end">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/choose1.png"/>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>