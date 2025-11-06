<?php
/**
 * The template for displaying search forms.
 *
 * @package MM_Theme
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( '搜索内容：', 'label', 'mm-theme' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( '输入关键词…', 'placeholder', 'mm-theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
    </label>
    <button type="submit" class="search-submit">
        <span class="screen-reader-text"><?php echo _x( '搜索', 'submit button', 'mm-theme' ); ?></span>
        🔍
    </button>
</form>
