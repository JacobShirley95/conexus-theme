<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

function left_sidebar_classes($secondary=true) {
	echo "two wide column side-panel ".($secondary ? "secondary-area" : "");
}

function right_sidebar_classes($secondary=true) {
	echo "two wide column side-panel ".($secondary ? "secondary-area" : "");
}

function content_classes($main=false) {
	echo "twelve wide column ".($main ? "content-column" : "")." responsive-column";
}

$FONTS = ["Work Sans", "Yantramanav"];

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

if ( ! function_exists( 'conexus_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function conexus_theme_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on conexus_theme, use a find and replace
	 * to change 'conexus_theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'custom-theme', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Navigation Bar Menu'),
		'social'  => __( 'Social Links Menu'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', conexus_theme_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // conexus_theme_setup
add_action( 'after_setup_theme', 'conexus_theme_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function conexus_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'conexus_theme' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'conexus_theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'conexus_theme_widgets_init' );

if ( ! function_exists( 'conexus_theme_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function conexus_theme_fonts_url() {
	$fonts_url = '';
	$subsets   = 'latin,latin-ext';

	$fonts = $FONTS;

	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'conexus_theme' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function conexus_theme_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'conexus_theme_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function conexus_theme_scripts() {
	wp_enqueue_style('conexus-theme-fonts', conexus_theme_fonts_url());

	wp_enqueue_style( 'conexus-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'conexus-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'conexus-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    //Load vendor scripts
    
    wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/vendor/jquery/dist/jquery.min.js', array(), '20151215', true );

    wp_enqueue_script( 'enquire', get_template_directory_uri() . '/vendor/enquire/dist/enquire.min.js', array(), '20151215', true );

    wp_enqueue_script( 'platform', get_template_directory_uri() . '/vendor/platform.js/platform.js', array(), '20151215', true );

    wp_enqueue_style( 'semantic-ui-style', get_template_directory_uri() . '/vendor/semantic/dist/semantic.min.css');
    wp_enqueue_script( 'semantic-ui', get_template_directory_uri() . '/vendor/semantic/dist/semantic.min.js', array(), '20151215', true );

    //Load my scripts
    
    wp_enqueue_script( 'functions', get_template_directory_uri() . '/js/functions.js', array(), '20151215', true );
    
    wp_enqueue_script( 'responsive-script', get_template_directory_uri() . '/js/responsive-script.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'conexus_theme_scripts' );

/**
 * Load Semantic-UI menu generator.
 */
include get_template_directory() . '/inc/semantic-ui-menu.php';

/**
 * Load Semantic-UI pagination functions,
 */
include get_template_directory() . '/inc/semantic-ui-pagination.php';

add_action('init','random_post');
function random_post() {
       global $wp;
       $wp->add_query_var('random');
       add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}
 
add_action('template_redirect','random_template');
function random_template() {
       if (get_query_var('random') == 1) {
               $posts = get_posts('post_type=post&orderby=rand&numberposts=1');
               foreach($posts as $post) {
                       $link = get_permalink($post);
               }
               wp_redirect($link,307);
               exit;
       }
}

function conexus_theme_nav_menu() {
	conexus_theme_semantic_ui_menu("primary");
}

// custom excerpt length
function conexus_theme_custom_excerpt_length( $length ) {
   return 100;
}
add_filter( 'excerpt_length', 'conexus_theme_custom_excerpt_length', 999 );

// add more link to excerpt
function conexus_theme_custom_excerpt_more($more) {
   return '...';
}
add_filter('excerpt_more', 'conexus_theme_custom_excerpt_more');

// custom excerpt length
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function conexus_theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<div class="comment">
		<a class="avatar"><div class="ui circular image"><?php echo get_avatar($comment); ?></div></a>
		<div class="content">
			
			<a class="author"><?php comment_author();?></a>
			<div class="metadata">
				<span class="date"><?php comment_time();?></span>
			</div>
			<div class="text"><?php comment_text();?></div>
			<div class="actions">
				<?php comment_reply_link(); ?>
				<?php edit_comment_link(__('Edit')); ?>
			</div>
		</div>
	</div>
<?php } ?>