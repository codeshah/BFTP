<?php
if ( ! function_exists( 'bftp_setup' ) ) :
function bftp_setup() {
	load_theme_textdomain( 'bftp', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bftp' ),
	) );
	
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	add_theme_support( 'custom-background', apply_filters( 'bftp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bftp_setup' );

function bftp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bftp_content_width', 640 );
}
add_action( 'after_setup_theme', 'bftp_content_width', 0 );


function bftp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'bftp' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'bftp' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bftp_widgets_init' );


function bftp_scripts() {
	wp_enqueue_style( 'bftp-style', get_stylesheet_uri() );
	wp_enqueue_style('bootstrap-main', get_template_directory_uri() . '/css/bootstrap.min.css' );
	//wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.css' );
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js' );
	wp_enqueue_script( 'bftp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bftp_scripts' );


require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';
