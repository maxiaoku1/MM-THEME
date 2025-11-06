<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @package MM_Theme
 */
?>
<section class="no-results not-found card">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( '没有找到相关内容', 'mm-theme' ); ?></h1>
    </header>

    <div class="page-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php printf( wp_kses_post( __( '准备好发布第一篇文章了吗？<a href="%s">立即创建</a>。', 'mm-theme' ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
        <?php elseif ( is_search() ) : ?>
            <p><?php esc_html_e( '换个关键词再试试吧。', 'mm-theme' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( '看起来我们没能找到你想要的内容。试试搜索功能吧。', 'mm-theme' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>
