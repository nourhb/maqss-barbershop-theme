<?php
/**
 * Maqss functions and definitions.
 *
 * @package Maqss
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MAQSS_VERSION', '1.0.0' );
define( 'MAQSS_DIR', get_template_directory() );
define( 'MAQSS_URI', get_template_directory_uri() );

/**
 * Theme setup: supports, menus, image sizes.
 *
 * @since 1.0.0
 */
function maqss_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'align-wide' );

	add_theme_support(
		'html5',
		array( 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'search-form' )
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 64,
			'width'       => 220,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary menu', 'maqss' ),
			'footer'  => __( 'Footer menu', 'maqss' ),
		)
	);

	load_theme_textdomain( 'maqss', MAQSS_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'maqss_setup' );

/**
 * Register the footer widget area.
 *
 * @since 1.0.0
 */
function maqss_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer widgets', 'maqss' ),
			'id'            => 'footer-widgets',
			'description'   => __( 'Widgets shown above the footer columns.', 'maqss' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'maqss_widgets_init' );

/**
 * Enqueue front-end assets: display + body fonts, theme stylesheet, theme script.
 *
 * @since 1.0.0
 */
function maqss_assets() {
	wp_enqueue_style(
		'maqss-fonts',
		'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'maqss-style',
		get_stylesheet_uri(),
		array( 'maqss-fonts' ),
		MAQSS_VERSION
	);

	wp_enqueue_script(
		'maqss-theme',
		MAQSS_URI . '/assets/js/theme.js',
		array(),
		MAQSS_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'maqss_assets' );

/**
 * Enqueue editor-only tweaks.
 *
 * @since 1.0.0
 */
function maqss_editor_assets() {
	wp_enqueue_style(
		'maqss-editor',
		MAQSS_URI . '/assets/css/editor.css',
		array(),
		MAQSS_VERSION
	);
}
add_action( 'enqueue_block_editor_assets', 'maqss_editor_assets' );

/**
 * Register custom block styles.
 *
 * @since 1.0.0
 */
function maqss_block_styles() {
	register_block_style(
		'core/button',
		array(
			'name'  => 'cut-outline',
			'label' => __( 'Cut outline', 'maqss' ),
		)
	);
	register_block_style(
		'core/quote',
		array(
			'name'  => 'big',
			'label' => __( 'Big', 'maqss' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'card',
			'label' => __( 'Card', 'maqss' ),
		)
	);
	register_block_style(
		'core/image',
		array(
			'name'  => 'framed',
			'label' => __( 'Framed', 'maqss' ),
		)
	);
	register_block_style(
		'core/heading',
		array(
			'name'  => 'poster',
			'label' => __( 'Poster', 'maqss' ),
		)
	);
}
add_action( 'init', 'maqss_block_styles' );

/**
 * Register the Maqss block pattern category.
 *
 * @since 1.0.0
 */
function maqss_pattern_category() {
	register_block_pattern_category(
		'maqss',
		array( 'label' => __( 'Maqss', 'maqss' ) )
	);
}
add_action( 'init', 'maqss_pattern_category' );

/**
 * Shorter excerpts with a branded read-more link.
 *
 * @since 1.0.0
 */
function maqss_excerpt_length() {
	return 24;
}
add_filter( 'excerpt_length', 'maqss_excerpt_length' );

function maqss_excerpt_more( $more ) {
	return sprintf(
		'&hellip; <a class="maqss-read-more" href="%s">%s</a>',
		esc_url( get_permalink() ),
		esc_html__( 'Keep reading', 'maqss' )
	);
}
add_filter( 'excerpt_more', 'maqss_excerpt_more' );

/**
 * Inline SVG icon helper (scissors, razor, chair, star, arrow).
 *
 * @since 1.0.0
 *
 * @param string $name Icon name.
 * @return string SVG markup.
 */
function maqss_icon( $name ) {
	$icons = array(
		'scissors' => '<path d="M6 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM20 4 8.5 15.5M20 20 8.5 8.5"/>',
		'razor'    => '<path d="M4 20 14 10M14 10l3-3 3 3-3 3-3-3zm-2-2 4 4"/>',
		'star'     => '<path d="M12 2l2.9 6.3 6.9.8-5.1 4.7 1.4 6.8L12 17.3 5.9 20.6l1.4-6.8L2.2 9.1l6.9-.8L12 2z"/>',
		'arrow'    => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'clock'    => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
		'pin'      => '<path d="M12 21s-7-5.5-7-11a7 7 0 0 1 14 0c0 5.5-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/>',
		'phone'    => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/>',
	);

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	return sprintf(
		'<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%s</svg>',
		$icons[ $name ]
	);
}

/**
 * Render the back-to-top button in the footer.
 *
 * @since 1.0.0
 */
function maqss_back_to_top() {
	echo '<button class="maqss-to-top" id="maqssToTop" aria-label="' . esc_attr__( 'Back to top', 'maqss' ) . '">';
	echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>';
	echo '</button>';
}
add_action( 'wp_footer', 'maqss_back_to_top' );
