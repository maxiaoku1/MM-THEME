<?php
/**
 * Functions hooked to theme templates.
 *
 * @package MM_Theme
 */

if ( ! function_exists( 'mm_theme_body_classes' ) ) {
    /**
     * Add custom classes to the array of body classes.
     *
     * @param array $classes Classes for the body element.
     *
     * @return array
     */
    function mm_theme_body_classes( $classes ) {
        if ( is_multi_author() ) {
            $classes[] = 'group-blog';
        }

        if ( is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'has-sidebar';
        } else {
            $classes[] = 'no-sidebar';
        }

        return $classes;
    }
}
add_filter( 'body_class', 'mm_theme_body_classes' );

if ( ! function_exists( 'mm_theme_pingback_header' ) ) {
    /**
     * Add a pingback url auto-discovery header for single posts, pages, or attachments.
     */
    function mm_theme_pingback_header() {
        if ( is_singular() && pings_open() ) {
            echo '<link rel="pingback" href="' . esc_url( get_bloginfo( 'pingback_url' ) ) . '">';
        }
    }
}
add_action( 'wp_head', 'mm_theme_pingback_header' );
