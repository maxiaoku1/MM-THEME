<?php
/**
 * The template for displaying comments.
 *
 * @package MM_Theme
 */

if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            printf(
                /* translators: 1: number of comments, 2: post title */
                _n( '%1$s 条评论在 “%2$s”', '%1$s 条评论在 “%2$s”', $comments_number, 'mm-theme' ),
                number_format_i18n( $comments_number ),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size'=> 60,
                )
            );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( '评论功能已关闭。', 'mm-theme' ); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>
