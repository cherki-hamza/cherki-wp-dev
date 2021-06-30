<?php

/**
 *  function for cherki theme dev
 *  @package CherkiDev
 */

// autoload classes , traits ..
if(! defined('CHERKI_DIR_PATH')){
    define('CHERKI_DIR_PATH' , untrailingslashit( get_template_directory() ));
}

require_once CHERKI_DIR_PATH . '/inc/helpers/autoloader.php';


function cherki_get_theme_instance(){
    \CHERKI_THEME\Inc\CHERKI_THEME::get_instance();
}

cherki_get_theme_instance();


 // Enqueuing
function load_css()
{

    wp_enqueue_style('styleshet' , get_stylesheet_uri() , [] , filemtime( get_template_directory() . '/style.css') , 'all' );

    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', [], 1, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('fontawsem-css', get_template_directory_uri() . '/assets/css/all.css', [], 1, 'all');
    wp_enqueue_style('fontawsem-css');

    wp_register_style('main', get_template_directory_uri() . '/assets/css/main.css', [], 1, 'all');
    wp_enqueue_style('main');

}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', ['jquery'], 1, true);
    wp_enqueue_script('bootstrap');

    wp_register_script('fontawsem-js', get_template_directory_uri() . '/assets/js/all.js', ['jquery'], 1, true);
    wp_enqueue_script('fontawsem-js');

    wp_register_script('main-js', get_template_directory_uri() . '/assets/js/main.js', [], 1, true);
    wp_enqueue_script('main-js');
}
add_action('wp_enqueue_scripts', 'load_js');


function dev_setup(){

    // Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'dev_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
}
add_action( 'after_setup_theme', 'dev_setup' );