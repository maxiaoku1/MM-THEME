<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package MM_Theme
 */

global $wp_query;

get_header();
?>
<main id="primary" class="site-main">
    <section class="error-404 not-found card">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( '抱歉，页面不见了。', 'mm-theme' ); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e( '你可以返回首页，或者尝试搜索你想要的内容。', 'mm-theme' ); ?></p>
            <?php get_search_form(); ?>
            <p>
                <a class="button-secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( '回到首页', 'mm-theme' ); ?></a>
            </p>
        </div>
    </section>
</main>
<?php get_footer(); ?>
