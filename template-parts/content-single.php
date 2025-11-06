<?php
/**
 * Template part for displaying single posts.
 *
 * @package MM_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card card' ); ?>>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="entry-meta">
            <?php mm_theme_posted_on(); ?>
        </div>
    </header>

    <div class="entry-content">
        <?php
        if ( has_post_thumbnail() ) {
            echo '<figure class="featured-image">';
            the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) );
            echo '</figure>';
        }

        the_content();

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( '分页：', 'mm-theme' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div>

    <footer class="entry-footer">
        <?php mm_theme_entry_footer(); ?>
    </footer>
</article>
