<?php
/**
 * Template tags used across the theme.
 *
 * @package MM_Theme
 */

if ( ! function_exists( 'mm_theme_the_post_navigation' ) ) {
    /**
     * Display navigation to next/previous set of posts when applicable.
     */
    function mm_theme_the_post_navigation() {
        if ( is_singular( 'attachment' ) ) {
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Published in', 'mm-theme' ) . '</span> <span class="nav-title">%title</span>',
                )
            );
        } elseif ( is_singular( 'post' ) ) {
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'mm-theme' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'mm-theme' ) . '</span> <span class="nav-title">%title</span>',
                )
            );
        }
    }
}

if ( ! function_exists( 'mm_theme_the_posts_navigation' ) ) {
    /**
     * Display navigation to next/previous set of posts on archive pages.
     */
    function mm_theme_the_posts_navigation() {
        the_posts_pagination(
            array(
                'mid_size'           => 2,
                'prev_text'          => esc_html__( '上一页', 'mm-theme' ),
                'next_text'          => esc_html__( '下一页', 'mm-theme' ),
                'screen_reader_text' => __( '文章导航', 'mm-theme' ),
                'class'              => 'pagination',
            )
        );
    }
}

if ( ! function_exists( 'mm_theme_excerpt_more' ) ) {
    /**
     * Customize the excerpt more string.
     *
     * @param string $more default more string.
     *
     * @return string
     */
    function mm_theme_excerpt_more( $more ) {
        if ( is_admin() ) {
            return $more;
        }

        return sprintf( '… <a class="read-more" href="%s">%s</a>', esc_url( get_permalink() ), esc_html__( 'Continue reading', 'mm-theme' ) );
    }
}
add_filter( 'excerpt_more', 'mm_theme_excerpt_more' );
