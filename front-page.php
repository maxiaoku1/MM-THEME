<?php
/**
 * Template for displaying the front page.
 *
 * @package MM_Theme
 */

global $post;

get_header();
?>
<main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', 'page' );
        endwhile;
    endif;

    $latest_posts = new WP_Query(
        array(
            'post_type'           => 'post',
            'posts_per_page'      => 3,
            'ignore_sticky_posts' => true,
        )
    );

    if ( $latest_posts->have_posts() ) :
        ?>
        <section class="card">
            <h2><?php esc_html_e( '最新文章', 'mm-theme' ); ?></h2>
            <div class="latest-posts-grid">
                <?php
                while ( $latest_posts->have_posts() ) :
                    $latest_posts->the_post();
                    ?>
                    <article <?php post_class( 'latest-post-card' ); ?>>
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="entry-meta"><?php mm_theme_posted_on(); ?></div>
                        <div class="entry-summary"><?php the_excerpt(); ?></div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <p>
                <?php
                $posts_page_id = get_option( 'page_for_posts' );
                if ( $posts_page_id ) :
                ?>
                <a class="button-secondary" href="<?php echo esc_url( get_permalink( $posts_page_id ) ); ?>">
                    <?php esc_html_e( '查看全部文章', 'mm-theme' ); ?>
                </a>
                <?php endif; ?>
            </p>
        </section>
        <?php
    endif;
    ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
