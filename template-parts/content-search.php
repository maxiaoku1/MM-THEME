<?php
/**
 * Template part for displaying search results.
 *
 * @package MM_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card card' ); ?>>
    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <div class="entry-meta">
            <?php mm_theme_posted_on(); ?>
        </div>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
</article>
