<?php
/**
 * The header for our theme.
 *
 * @package MM_Theme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="container header-inner">
        <div class="site-branding">
            <?php
            the_custom_logo();
            if ( is_front_page() && is_home() ) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php
            endif;
            $mm_theme_description = get_bloginfo( 'description', 'display' );
            if ( $mm_theme_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo esc_html( $mm_theme_description ); ?></p>
            <?php endif; ?>
        </div>
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'mm-theme' ); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'primary-menu',
                        'container'      => false,
                        'depth'          => 1,
                    )
                );
                ?>
            </nav>
        <?php endif; ?>
        <div class="hero">
            <div class="hero-copy">
                <h1><?php echo wp_kses_post( get_theme_mod( 'mm_theme_hero_title', __( '你好，我是 MM 主题', 'mm-theme' ) ) ); ?></h1>
                <p><?php echo wp_kses_post( get_theme_mod( 'mm_theme_hero_subtitle', __( '用优雅的设计和出色的可访问性，为你的 WordPress 网站提供全新体验。', 'mm-theme' ) ) ); ?></p>
                <a class="button" href="<?php echo esc_url( get_theme_mod( 'mm_theme_hero_cta_url', '#content' ) ); ?>">
                    <?php echo esc_html( get_theme_mod( 'mm_theme_hero_cta_label', __( '探索主题', 'mm-theme' ) ) ); ?>
                </a>
            </div>
            <div class="hero-media">
                <div class="card">
                    <h2><?php esc_html_e( '主题亮点', 'mm-theme' ); ?></h2>
                    <ul>
                        <li><?php esc_html_e( '响应式网格布局', 'mm-theme' ); ?></li>
                        <li><?php esc_html_e( '颜色与排版可自定义', 'mm-theme' ); ?></li>
                        <li><?php esc_html_e( '深度整合古腾堡编辑器', 'mm-theme' ); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php if ( get_theme_mod( 'mm_theme_display_breadcrumbs', true ) ) : ?>
            <?php mm_theme_breadcrumbs(); ?>
        <?php endif; ?>
    </div>
</header>
<div id="content" class="site-content">
    <div class="container content-area">
