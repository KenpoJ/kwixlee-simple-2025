<?php
/**
 * kwixlee_simple_2025 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kwixlee_simple_2025
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kwixlee_simple_2025_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kwixlee_simple_2025, use a find and replace
		* to change 'kwixlee_simple_2025' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kwixlee_simple_2025', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kwixlee_simple_2025' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kwixlee_simple_2025_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kwixlee_simple_2025_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kwixlee_simple_2025_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kwixlee_simple_2025_content_width', 640 );
}
add_action( 'after_setup_theme', 'kwixlee_simple_2025_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kwixlee_simple_2025_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kwixlee_simple_2025' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kwixlee_simple_2025' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kwixlee_simple_2025_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kwixlee_simple_2025_scripts() {
	wp_enqueue_style( 'kwixlee_simple_2025-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kwixlee_simple_2025-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kwixlee_simple_2025-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kwixlee_simple_2025_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function video_samples_blog_taxonomy_queries( $query ) {
    if ( ( $query->is_category() || $query->is_tag() )
        && $query->is_main_query() ) {
            $query->set( 'post_type', array( 'post', 'video-sample' ) );
    }
}
add_action( 'pre_get_posts', 'video_samples_blog_taxonomy_queries' );

function project_intake_handler() {
	// if ( is_page_template( 'page-templates/page-project-intake.php' ) ) {
	// 	echo 'Here is the project intake form.';
	// 	return;
	// }
	// echo 'Hello from the project intake handler.';

	if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) {
		return;
	}

	// Sanitize and validate form data
	$name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
	$address = isset($_POST['address']) ? sanitize_text_field($_POST['address']) : '';
	$city = isset($_POST['city']) ? sanitize_text_field($_POST['city']) : '';
	$state = isset($_POST['state']) ? sanitize_text_field($_POST['state']) : '';
	$zip = isset($_POST['zip']) ? sanitize_text_field($_POST['zip']) : '';
	$phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
	$email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
	$company_name = isset($_POST['company_name']) ? sanitize_text_field($_POST['company_name']) : '';
	$company_address = isset($_POST['company_address']) ? sanitize_text_field($_POST['company_address']) : '';
	$company_city = isset($_POST['company_city']) ? sanitize_text_field($_POST['company_city']) : '';
	$company_state = isset($_POST['company_state']) ? sanitize_text_field($_POST['company_state']) : '';
	$company_zip = isset($_POST['company_zip']) ? sanitize_text_field($_POST['company_zip']) : '';
	$company_phone = isset($_POST['company_phone']) ? sanitize_text_field($_POST['company_phone']) : '';
	$company_email = isset($_POST['company_email']) ? sanitize_email($_POST['company_email']) : '';
	$project_title = isset($_POST['project_title']) ? sanitize_text_field($_POST['project_title']) : '';
	$description = isset($_POST['description']) ? sanitize_textarea_field($_POST['description']) : '';

	// if ( empty( $name ) || empty( $email ) || empty( $project_title ) ) {
	// 	wp_die( __( 'Please fill in all required fields.', 'kwixlee_simple_2025' ) );
	// }

	// Process the form data (e.g., save to database, send email, etc.)
	echo $name . '<br>';
	echo $address . '<br>';
	echo $city . '<br>';
	echo $state . '<br>';
	echo $zip . '<br>';
	echo $phone . '<br>';
	echo $email . '<br>';

	wp_safe_redirect( home_url( '/project-intake-form-submitted/' ) );
	
	// Example: Send an email notification
}

function submit_project_intake() {
	project_intake_handler();
}
add_action( 'template_redirect', 'submit_project_intake', 2 );


/**
 * Load custom shortcodes.
 */
include_once('shortcodes/video-showcase-display.php');
include_once('shortcodes/testimonials_shortcode.php');
include_once('shortcodes/project_intake_form_shortcode.php');

add_shortcode('video_samples_display', 'video_showcase_home_shortcode');
add_shortcode('testimonials', 'testimonal_posts_display_shortcode');
add_shortcode('project_intake_form', 'project_intake_form_shortcode');
