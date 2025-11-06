<?php
/**
 * The main template file.
 *
 * @package MM_Theme
 */

global $wp_query;

get_header();
?>
<main id="primary" class="site-main">
    <?php if ( have_posts() ) { ?>
        <?php while ( have_posts() ) { the_post(); ?>
            <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
        <?php } ?>

        <?php if ( $wp_query->max_num_pages > 1 ) { ?>
            <?php mm_theme_the_posts_navigation(); ?>
        <?php } ?>
    <?php } else { ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php } ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
