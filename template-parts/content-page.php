<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package MM_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card card' ); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( '分页：', 'mm-theme' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div>
</article>
