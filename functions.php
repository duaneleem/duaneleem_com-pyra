<?php
/**
 * DuaneLeem.com Pyra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DuaneLeem.com_Pyra
 */

if ( ! function_exists( 'duaneleem_com_pyra_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function duaneleem_com_pyra_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on DuaneLeem.com Pyra, use a find and replace
		 * to change 'duaneleem-com-pyra' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'duaneleem-com-pyra', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'duaneleem-com-pyra' ),
		) );

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
		add_theme_support( 'custom-background', apply_filters( 'duaneleem_com_pyra_custom_background_args', array(
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
			'height'      => 70,
			'width'       => 490,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'duaneleem_com_pyra_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function duaneleem_com_pyra_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'duaneleem_com_pyra_content_width', 640 );
}
add_action( 'after_setup_theme', 'duaneleem_com_pyra_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function duaneleem_com_pyra_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'duaneleem-com-pyra' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'duaneleem-com-pyra' ),
		'before_widget' => '<section id="%1$s" class="panel panel-default %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="panel-heading space-bottom-10"><h3 class="panel-title widget-title">',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'duaneleem_com_pyra_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function duaneleem_com_pyra_scripts() {
	/* ======================================================================
		Theme Dependencies | Styles
	====================================================================== */
	wp_enqueue_style("bootstrap", get_template_directory_uri() . "/node_modules/bootstrap/dist/css/bootstrap.min.css");
	wp_enqueue_style("fontawesome", get_template_directory_uri() . "/node_modules/@fortawesome/fontawesome-free/css/all.min.css");
	wp_enqueue_style("owl-carousel", get_template_directory_uri() . "/assets/plugins/owl-carousel/owl.carousel.css");
	wp_enqueue_style("owl-theme", get_template_directory_uri() . "/assets/plugins/owl-carousel/owl.theme.css");
	wp_enqueue_style("owl-transitions", get_template_directory_uri() . "/assets/plugins/owl-carousel/owl.transitions.css");
	wp_enqueue_style("magnific-popup", get_template_directory_uri() . "/assets/plugins/magnific-popup/magnific-popup.css");
	wp_enqueue_style("animate", get_template_directory_uri() . "/assets/template/css/animate.css");
	wp_enqueue_style("superslides", get_template_directory_uri() . "/assets/template/css/superslides.css");
	wp_enqueue_style("slider-revolution-v4-settings", get_template_directory_uri() . "/assets/plugins/slider.revolution.v4/css/settings.css");
	wp_enqueue_style("timeline", get_template_directory_uri() . "/assets/css/timeline.css");
	wp_enqueue_style("essentials", get_template_directory_uri() . "/assets/template/css/essentials.css");
	wp_enqueue_style("layout", get_template_directory_uri() . "/assets/template/css/layout.css");
	wp_enqueue_style("layout-responsive", get_template_directory_uri() . "/assets/template/css/layout-responsive.css");
	wp_enqueue_style("lightgrey", get_template_directory_uri() . "/assets/template/css/color_scheme/lightgrey.css");
	wp_enqueue_style("header", get_template_directory_uri() . "/assets/css/header.css");
	wp_enqueue_style("main-styles", get_template_directory_uri() . "/assets/css/main.css");

	/* ======================================================================
		Theme Dependencies | Javascript
	====================================================================== */
	wp_enqueue_script("modernizr", get_template_directory_uri() . "/assets/plugins/modernizr.min.js");
	wp_enqueue_script("jquery", get_template_directory_uri() . "/node_modules/jquery/dist/jquery.min.js");
	wp_enqueue_script("jquery-easing", get_template_directory_uri() . "/assets/plugins/jquery.easing.1.3.js");
	wp_enqueue_script("jquery-cookie", get_template_directory_uri() . "/assets/plugins/jquery.cookie.js");
	wp_enqueue_script("jquery-appear", get_template_directory_uri() . "/assets/plugins/jquery.appear.js");
	wp_enqueue_script("jquery-isotope", get_template_directory_uri() . "/assets/plugins/jquery.isotope.js");
	wp_enqueue_script("masonry", get_template_directory_uri() . "/assets/plugins/masonry.js");
	wp_enqueue_script("bootstrap", get_template_directory_uri() . "/node_modules/bootstrap/dist/js/bootstrap.min.js");
	wp_enqueue_script("jquery-magnific-popup", get_template_directory_uri() . "/assets/plugins/magnific-popup/jquery.magnific-popup.min.js");
	wp_enqueue_script("owl-carousel", get_template_directory_uri() . "/assets/plugins/owl-carousel/owl.carousel.min.js");
	wp_enqueue_script("jquery-stellar", get_template_directory_uri() . "/assets/plugins/stellar/jquery.stellar.min.js");
	wp_enqueue_script("jquery-knob", get_template_directory_uri() . "/assets/plugins/knob/js/jquery.knob.js");
	wp_enqueue_script("jquery-backstretch", get_template_directory_uri() . "/assets/plugins/jquery.backstretch.min.js");
	wp_enqueue_script("jquery-superslides", get_template_directory_uri() . "/assets/plugins/superslides/dist/jquery.superslides.min.js");
	wp_enqueue_script("mediaelement-and-player", get_template_directory_uri() . "/assets/plugins/mediaelement/build/mediaelement-and-player.min.js");
	wp_enqueue_script("jquery-themepunch-tools", get_template_directory_uri() . "/assets/plugins/slider.revolution.v4/js/jquery.themepunch.tools.min.js");
	wp_enqueue_script("jquery-themepunch-revolution", get_template_directory_uri() . "/assets/plugins/slider.revolution.v4/js/jquery.themepunch.revolution.min.js");
	wp_enqueue_script("slider-revolution", get_template_directory_uri() . "/assets/js/slider_revolution.js");
	wp_enqueue_script("scripts-template", get_template_directory_uri() . "/assets/template/js/scripts.js");
	wp_enqueue_script("customjs", get_template_directory_uri() . "/assets/js/custom.js");

	/* ======================================================================
		Added by underscores.
	====================================================================== */
	wp_enqueue_style( 'duaneleem-com-pyra-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'duaneleem-com-pyra-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'duaneleem-com-pyra-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	} // if
} // duaneleem_com_pyra_scripts
add_action( 'wp_enqueue_scripts', 'duaneleem_com_pyra_scripts' );

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

