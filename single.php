<?php
/**
 * The template for displaying all single posts.
 *
 * @package MM_Theme
 */

global $post;

get_header();
?>
<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'single' );

        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( '上一篇', 'mm-theme' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( '下一篇', 'mm-theme' ) . '</span> <span class="nav-title">%title</span>',
            )
        );

        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }
    endwhile;
    ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
