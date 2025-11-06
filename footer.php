<?php
/**
 * The template for displaying the footer.
 *
 * @package MM_Theme
 */
?>
        </div><!-- .content-area -->
    </div><!-- .container -->
</div><!-- #content -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
                <?php dynamic_sidebar( 'footer-widgets' ); ?>
            <?php else : ?>
                <section class="footer-widget">
                    <h3 class="widget-title"><?php esc_html_e( '关于 MM Theme', 'mm-theme' ); ?></h3>
                    <p><?php esc_html_e( '一款专为中文用户打造的现代 WordPress 主题，关注速度、可访问性与易用性。', 'mm-theme' ); ?></p>
                </section>
            <?php endif; ?>
            <section class="footer-widget">
                <h3 class="widget-title"><?php esc_html_e( '快速链接', 'mm-theme' ); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( '首页', 'mm-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( '博客', 'mm-theme' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( '联系', 'mm-theme' ); ?></a></li>
                </ul>
            </section>
            <section class="footer-widget">
                <h3 class="widget-title"><?php esc_html_e( '订阅资讯', 'mm-theme' ); ?></h3>
                <p><?php esc_html_e( '订阅我们的新闻通讯，第一时间获取主题更新与最佳实践。', 'mm-theme' ); ?></p>
                <form>
                    <label class="screen-reader-text" for="newsletter-email"><?php esc_html_e( '邮箱地址', 'mm-theme' ); ?></label>
                    <input type="email" id="newsletter-email" placeholder="<?php esc_attr_e( '输入邮箱地址', 'mm-theme' ); ?>">
                    <button type="submit"><?php esc_html_e( '立即订阅', 'mm-theme' ); ?></button>
                </form>
            </section>
        </div>
        <div class="footer-bottom">
            <div class="footer-text"><?php echo wp_kses_post( get_theme_mod( 'mm_theme_footer_text', __( 'Built with MM Theme.', 'mm-theme' ) ) ); ?></div>
            <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer menu', 'mm-theme' ); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                        )
                    );
                    ?>
                </nav>
            <?php endif; ?>
            <p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'mm-theme' ); ?></p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
