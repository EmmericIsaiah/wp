<?php
/**
 * test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'test_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function test_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on test, use a find and replace
		 * to change 'test' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'test', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'test' ),
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
				'test_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'test_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'test_widgets_init' );





/**
 * Enqueue scripts and styles.
 */
function test_scripts() {
	wp_enqueue_style( 'test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'test-style', 'rtl', 'replace' );
	wp_enqueue_script( 'test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pckgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pckgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'test-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_scripts' );

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


/**
ACF form submission for newsletters
*/
add_action('acf/init', 'my_acf_form_init');
function my_acf_form_init() {

    // Check function exists.
    if( function_exists('acf_register_form') ) {
        // Register form.
        acf_register_form(array(
            'id'       => 'new-contact',
            'post_id'  => 'new_post',
            'new_post' => array(
                'post_type'   => 'contact',
                'post_status' => 'publish'
            ),
            'post_title'  => false,
            'post_content'=> false
        ));
    }
}

/**
How to change a title.
*/
function lh_acf_save_post( $post_id ) {

    // Don't do this on the ACF post type
    if ( get_post_type( $post_id ) == 'contacts' ) {
        return;
    }

    $new_title_p1 = get_field( 'first_name', $post_id );
    $new_title_p2 = get_field( 'last_name', $post_id );


    // Prevent iInfinite looping...
    remove_action( 'acf/save_post', 'lh_acf_save_post' );

    // Grab post data
    $post = array(
        'ID'            => $post_id,
        'post_title'    => $new_title_p1.' '.$new_title_p2,
    );

    // Update the Post
    wp_update_post( $post );

    // Continue save action
    add_action( 'acf/save_post', 'lh_save_post' );

    // Set the return URL in case of 'new' post
    $_POST['return'] = add_query_arg( 'updated', 'true', get_permalink( $post_id ) );
}
add_action( 'acf/save_post', 'lh_acf_save_post', 10, 1 );

//Custom checkbox for home article wordpress

/* Define the custom box */
add_action( 'add_meta_boxes', 'wpse_61041_add_custom_box' );

/* Do something with the data entered */
add_action( 'save_post', 'wpse_61041_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function wpse_61041_add_custom_box() {
    add_meta_box( 
        'wpse_61041_sectionid',
        'Article template',
        'wpse_61041_inner_custom_box',
        'post',
        'side',
        'high'
    );
}

/* Prints the box content */
function wpse_61041_inner_custom_box($post)
{
    // Use nonce for verification
    wp_nonce_field( 'wpse_61041_wpse_61041_field_nonce', 'wpse_61041_noncename' );

    // Get saved value, if none exists, "default" is selected
    $saved = get_post_meta( $post->ID, 'article_type', true);
    if( !$saved )
        $saved = 'default';

    $fields = array(
        'imagetext'       => __('Image & text', 'wpse'),
        'text'     => __('Text', 'wpse'),
        'image'      => __('Image', 'wpse'),
        'default'   => __('Default', 'wpse'),
    );

    foreach($fields as $key => $label)
    {
        printf(
            '<input type="radio" name="article_type" value="%1$s" id="article_type[%1$s]" %3$s />'.
            '<label for="article_type[%1$s]"> %2$s ' .
            '</label><br>',
            esc_attr($key),
            esc_html($label),
            checked($saved, $key, false)
        );
    }
}

/* When the post is saved, saves our custom data */
function wpse_61041_save_postdata( $post_id ) 
{
      // verify if this is an auto save routine. 
      // If it is our form has not been submitted, so we dont want to do anything
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
          return;

      // verify this came from the our screen and with proper authorization,
      // because save_post can be triggered at other times
      if ( !wp_verify_nonce( $_POST['wpse_61041_noncename'], 'wpse_61041_wpse_61041_field_nonce' ) )
          return;

      if ( isset($_POST['article_type']) && $_POST['article_type'] != "" ){
            update_post_meta( $post_id, 'article_type', $_POST['article_type'] );
      } 
}


//Custom post types for notifications

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'notifications',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Notifications' ),
                'singular_name' => __( 'Notifications' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'notifications') return false;
    return $current_status;
}

//---------------------------------------------------------------------


function HelloWorldShortcode() {
	return '<p>Hello World!</p>';
}
add_shortcode('helloworld', 'HelloWorldShortcode');