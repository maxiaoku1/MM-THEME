<?php
/**
 * MM Theme functions and definitions.
 *
 * @package MM_Theme
 */

define( 'MM_THEME_VERSION', '1.0.0' );

require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/template-functions.php';

if ( ! function_exists( 'mm_theme_setup' ) ) {
    /**
     * Theme setup.
     */
    function mm_theme_setup() {
        load_theme_textdomain( 'mm-theme', get_template_directory() . '/languages' );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'custom-logo', array(
            'height'      => 120,
            'width'       => 120,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-styles' );
        add_editor_style( 'assets/css/editor.css' );

        register_nav_menus(
            array(
                'primary' => __( 'Primary Menu', 'mm-theme' ),
                'footer'  => __( 'Footer Menu', 'mm-theme' ),
            )
        );
    }
}
add_action( 'after_setup_theme', 'mm_theme_setup' );

/**
 * Enqueue theme styles and scripts.
 */
function mm_theme_enqueue_assets() {
    $theme_uri = get_template_directory_uri();

    wp_enqueue_style( 'mm-theme-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null );
    wp_enqueue_style( 'mm-theme-style', get_stylesheet_uri(), array(), MM_THEME_VERSION );
    wp_enqueue_script( 'mm-theme-script', $theme_uri . '/assets/js/theme.js', array( 'jquery' ), MM_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'mm_theme_enqueue_assets' );

/**
 * Register widget areas.
 */
function mm_theme_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Primary Sidebar', 'mm-theme' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Add widgets here.', 'mm-theme' ),
            'before_widget' => '<section id="%1$s" class="sidebar-widget widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Widgets', 'mm-theme' ),
            'id'            => 'footer-widgets',
            'description'   => __( 'Widgets displayed in the footer area.', 'mm-theme' ),
            'before_widget' => '<section id="%1$s" class="footer-widget widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'mm_theme_widgets_init' );

/**
 * Add editor styles for a closer WYSIWYG experience.
 */
function mm_theme_block_editor_styles() {
    add_editor_style( 'assets/css/editor.css' );
}
add_action( 'after_setup_theme', 'mm_theme_block_editor_styles' );
