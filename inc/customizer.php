<?php
/**
 * Theme Customizer functionality.
 *
 * @package MM_Theme
 */

if ( ! function_exists( 'mm_theme_customize_register' ) ) {
    /**
     * Register customizer settings and controls.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function mm_theme_customize_register( $wp_customize ) {
        $wp_customize->add_setting(
            'mm_theme_accent_color',
            array(
                'default'           => '#2b59c3',
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'mm_theme_accent_color',
                array(
                    'label'   => __( 'Accent Color', 'mm-theme' ),
                    'section' => 'colors',
                )
            )
        );

        $wp_customize->add_setting(
            'mm_theme_display_breadcrumbs',
            array(
                'default'           => true,
                'sanitize_callback' => 'rest_sanitize_boolean',
            )
        );

        $wp_customize->add_control(
            'mm_theme_display_breadcrumbs',
            array(
                'type'    => 'checkbox',
                'label'   => __( 'Display breadcrumbs', 'mm-theme' ),
                'section' => 'title_tagline',
            )
        );

        $wp_customize->add_setting(
            'mm_theme_footer_text',
            array(
                'default'           => __( 'Built with MM Theme.', 'mm-theme' ),
                'sanitize_callback' => 'wp_kses_post',
            )
        );

        $wp_customize->add_control(
            'mm_theme_footer_text',
            array(
                'type'    => 'textarea',
                'label'   => __( 'Footer Text', 'mm-theme' ),
                'section' => 'title_tagline',
            )
        );

        $wp_customize->add_section(
            'mm_theme_hero_section',
            array(
                'title'       => __( 'Hero 区域', 'mm-theme' ),
                'priority'    => 30,
                'description' => __( '自定义首页顶部的文案与按钮。', 'mm-theme' ),
            )
        );

        $wp_customize->add_setting(
            'mm_theme_hero_title',
            array(
                'default'           => __( '你好，我是 MM 主题', 'mm-theme' ),
                'sanitize_callback' => 'wp_kses_post',
            )
        );

        $wp_customize->add_control(
            'mm_theme_hero_title',
            array(
                'type'    => 'text',
                'label'   => __( '标题', 'mm-theme' ),
                'section' => 'mm_theme_hero_section',
            )
        );

        $wp_customize->add_setting(
            'mm_theme_hero_subtitle',
            array(
                'default'           => __( '用优雅的设计和出色的可访问性，为你的 WordPress 网站提供全新体验。', 'mm-theme' ),
                'sanitize_callback' => 'wp_kses_post',
            )
        );

        $wp_customize->add_control(
            'mm_theme_hero_subtitle',
            array(
                'type'    => 'textarea',
                'label'   => __( '副标题', 'mm-theme' ),
                'section' => 'mm_theme_hero_section',
            )
        );

        $wp_customize->add_setting(
            'mm_theme_hero_cta_label',
            array(
                'default'           => __( '探索主题', 'mm-theme' ),
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control(
            'mm_theme_hero_cta_label',
            array(
                'type'    => 'text',
                'label'   => __( '按钮文字', 'mm-theme' ),
                'section' => 'mm_theme_hero_section',
            )
        );

        $wp_customize->add_setting(
            'mm_theme_hero_cta_url',
            array(
                'default'           => '#content',
                'sanitize_callback' => 'esc_url_raw',
            )
        );

        $wp_customize->add_control(
            'mm_theme_hero_cta_url',
            array(
                'type'    => 'url',
                'label'   => __( '按钮链接', 'mm-theme' ),
                'section' => 'mm_theme_hero_section',
            )
        );
    }
}
add_action( 'customize_register', 'mm_theme_customize_register' );

if ( ! function_exists( 'mm_theme_customizer_css' ) ) {
    /**
     * Output customizer styles.
     */
    function mm_theme_customizer_css() {
        $accent_color = get_theme_mod( 'mm_theme_accent_color', '#2b59c3' );
        ?>
        <style type="text/css">
            :root {
                --color-primary: <?php echo esc_html( $accent_color ); ?>;
            }
            .button,
            .hero .button,
            .pagination .page-numbers.current,
            .pagination .page-numbers:hover {
                background-color: <?php echo esc_html( $accent_color ); ?>;
            }
        </style>
        <?php
    }
}
add_action( 'wp_head', 'mm_theme_customizer_css' );
