<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Food Restro Zone
 */
$food_restro_zone_post_page_title =  get_theme_mod( 'food_restro_zone_post_page_title', 1 );
$food_restro_zone_post_page_meta =  get_theme_mod( 'food_restro_zone_post_page_meta', 1 );
$food_restro_zone_post_page_thumb =  get_theme_mod( 'food_restro_zone_post_page_thumb', 1 );
$food_restro_zone_post_page_content =  get_theme_mod( 'food_restro_zone_post_page_content', 1 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
    <?php if ($food_restro_zone_post_page_thumb == 1 ) {?>
        <?php if(has_post_thumbnail()){
          the_post_thumbnail();
          } else{?>
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/choose1.png" alt="" />
        <?php } ?>
    <?php }?>
    <?php if ($food_restro_zone_post_page_meta == 1 ) {?>
        <div class="meta-info-box my-2">
            <span class="entry-author"><?php esc_html_e('BY','food-restro-zone'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            <span class="ms-2"><?php echo esc_html(get_the_date()); ?></span>
        </div>
    <?php }?>
    <div class="post-summery">
        <?php if ($food_restro_zone_post_page_title == 1 ) {?>
            <?php the_title('<h3 class="entry-title pb-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
        <?php }?>
        <?php if ($food_restro_zone_post_page_content == 1 ) {?>
            <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('food_restro_zone_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('food_restro_zone_post_page_excerpt_suffix','[...]')); ?></p>
        <?php }?>
        <a href="<?php the_permalink(); ?>" class="btn-text"><?php esc_html_e('Read More','food-restro-zone'); ?></a>
    </div>
</article>
