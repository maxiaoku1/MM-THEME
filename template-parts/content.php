<?php
/**
 * Template part for displaying posts.
 *
 * @package MM_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card card' ); ?>>
    <header class="entry-header">
        <?php
        if ( is_singular() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        } else {
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }
        ?>
        <div class="entry-meta">
            <?php mm_theme_posted_on(); ?>
        </div>
    </header>

    <div class="entry-summary">
        <?php
        if ( is_singular() ) {
            the_content( sprintf( '<span class="screen-reader-text">%s</span>', get_the_title() ) );
        } else {
            the_excerpt();
        }
        ?>
    </div>

    <?php if ( has_post_thumbnail() ) : ?>
        <figure class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
            </a>
        </figure>
    <?php endif; ?>

    <footer class="entry-footer">
        <?php mm_theme_entry_footer(); ?>
    </footer>
</article>
