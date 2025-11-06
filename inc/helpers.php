<?php
/**
 * Helper functions for MM Theme.
 *
 * @package MM_Theme
 */

if ( ! function_exists( 'mm_theme_posted_on' ) ) {
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function mm_theme_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x( 'Published %s', 'post date', 'mm-theme' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x( 'by %s', 'post author', 'mm-theme' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}

if ( ! function_exists( 'mm_theme_entry_footer' ) ) {
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function mm_theme_entry_footer() {
        if ( 'post' === get_post_type() ) {
            $categories_list = get_the_category_list( esc_html__( ', ', 'mm-theme' ) );
            if ( $categories_list ) {
                printf( '<span class="cat-links">%s</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }

            $tags_list = get_the_tag_list( '', esc_html_x( ' · ', 'list item separator', 'mm-theme' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links">%s</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }

        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            comments_popup_link( sprintf( '<span class="comments-link">%s</span>', esc_html__( 'Leave a comment', 'mm-theme' ) ) );
        }
    }
}

if ( ! function_exists( 'mm_theme_breadcrumbs' ) ) {
    /**
     * Outputs breadcrumbs for the current view.
     */
    function mm_theme_breadcrumbs() {
        if ( is_front_page() ) {
            return;
        }

        echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'mm-theme' ) . '"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'mm-theme' ) . '</a>';

        if ( is_category() || is_single() ) {
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                $category = $categories[0];
                echo '<span aria-hidden="true">/</span><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
            }
            if ( is_single() ) {
                echo '<span aria-hidden="true">/</span><span>' . esc_html( get_the_title() ) . '</span>';
            }
        } elseif ( is_page() ) {
            global $post;
            if ( $post->post_parent ) {
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                foreach ( $ancestors as $ancestor ) {
                    echo '<span aria-hidden="true">/</span><a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a>';
                }
            }
            echo '<span aria-hidden="true">/</span><span>' . esc_html( get_the_title() ) . '</span>';
        } elseif ( is_search() ) {
            echo '<span aria-hidden="true">/</span><span>' . sprintf( esc_html__( 'Search: %s', 'mm-theme' ), esc_html( get_search_query() ) ) . '</span>';
        } elseif ( is_archive() ) {
            echo '<span aria-hidden="true">/</span><span>' . esc_html( get_the_archive_title() ) . '</span>';
        } elseif ( is_404() ) {
            echo '<span aria-hidden="true">/</span><span>' . esc_html__( 'Error 404', 'mm-theme' ) . '</span>';
        }

        echo '</nav>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
}
