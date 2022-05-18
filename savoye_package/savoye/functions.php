<?php
$savoye_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';

//Theme Set up:
function savoye_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
  add_theme_support( 'custom-header' ); 
  remove_filter ('the_content', 'wpautop');
  add_theme_support( 'custom-background' );
  $lang = get_template_directory_uri() . '/languages';
  load_theme_textdomain('savoye', $lang);
  add_theme_support( 'post-thumbnails' );
  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );
  // Switches default core markup for search form, comment form, and comments
  // to output valid HTML5.
  add_theme_support( 'title-tag' );
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' =>  esc_html__( 'Primary Navigation Menu.', 'savoye' ),
    'dark' =>  esc_html__( 'Multi Dark Page Menu.', 'savoye' ),
    'lightsidebar' =>  esc_html__( 'Multi Light Sidebar Menu.', 'savoye' ),
    'darksidebar' =>  esc_html__( 'Multi Dark Sidebar Menu.', 'savoye' ),
    'one-light' =>  esc_html__( 'Onepage Light Menu.', 'savoye' ),
    'one-dark' =>  esc_html__( 'Onepage Dark Menu.', 'savoye' ),
    'onelightsidebar' =>  esc_html__( 'Onepage Light Sidebar Menu.', 'savoye' ),
    'onedarksidebar' =>  esc_html__( 'Onepage Dark Sidebar Menu.', 'savoye' ),
    'service_light' =>  esc_html__( 'Service Light Menu.', 'savoye' ),
    'service_dark' =>  esc_html__( 'Service Dark Menu.', 'savoye' ),
    'service_lightsidebar' =>  esc_html__( 'Service Light Sidebar Menu.', 'savoye' ),
    'service_darksidebar' =>  esc_html__( 'Service Dark Sidebar Menu.', 'savoye' ),
	) );
    // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'savoye_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

function savoye_theme_scripts_styles() {
	$savoye_redux_demo = get_option('redux_demo');
	$protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'savoye-plugins', get_template_directory_uri().'/css/plugins.css');
         

    if(!is_page_template('page-templates/blog-dark.php') and !is_page_template('page-templates/blog-dark-2.php')  and !is_page_template('page-templates/multi-dark.php')  and !is_page_template('page-templates/multi-lightsidebar.php') and !is_page_template('page-templates/multi-darksidebar.php')){
        wp_enqueue_style( 'savoye-style', get_template_directory_uri().'/css/style.css');
    }   

    if(is_page_template('page-templates/blog-dark.php') or is_page_template('page-templates/blog-dark-2.php') or is_page_template('page-templates/multi-dark.php')  or is_page_template('page-templates/onepage-dark.php') or is_page_template('page-templates/multi-darksidebar.php')){
        wp_enqueue_style( 'savoye-style-dark', get_template_directory_uri().'/css/dark/style.css');
    }

    if(is_page_template('page-templates/blog-lightsidebar-1.php') or is_page_template('page-templates/blog-lightsidebar-2.php') or is_page_template('page-templates/multi-lightsidebar.php')   or is_page_template('page-templates/onepage-lightsidebar.php')){
        wp_enqueue_style( 'savoye-style-sidebarlight', get_template_directory_uri().'/css/sidebarlight/style.css');
    }

    if(is_page_template('page-templates/blog-darksidebar-1.php') or is_page_template('page-templates/blog-darksidebar-2.php')  or is_page_template('page-templates/onepage-darksidebar.php') or is_page_template('page-templates/multi-darksidebar.php')){
        wp_enqueue_style( 'savoye-style-sidebardark', get_template_directory_uri().'/css/sidebardark/style.css');
    }
    wp_enqueue_style( 'savoye-css', get_stylesheet_uri(), array(), '2022-02-11' );

    if(isset($savoye_redux_demo['chosen-color']) && $savoye_redux_demo['chosen-color']==1){
    wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
    }    
    if(isset($savoye_redux_demo['support-rtl']) && $savoye_redux_demo['support-rtl']==1){
    wp_enqueue_style( 'support-rtl', get_template_directory_uri().'/rtl.css');
    }
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
  //Javascript
    wp_enqueue_script("jquery", get_template_directory_uri()."/js/jquery-3.6.0.min.js",array(),false,true);
    wp_enqueue_script("jquery-migrate", get_template_directory_uri()."/js/jquery-migrate-3.0.0.min.js",array(),false,true);
    wp_enqueue_script("modernizr", get_template_directory_uri()."/js/modernizr-2.6.2.min.js",array(),false,true);
    wp_enqueue_script("imagesloaded-pkgd", get_template_directory_uri()."/js/imagesloaded.pkgd.min.js",array(),false,true);
    wp_enqueue_script("jquery-isotope", get_template_directory_uri()."/js/jquery.isotope.v3.0.2.js",array(),false,true);
    wp_enqueue_script("popper", get_template_directory_uri()."/js/popper.min.js",array(),false,true);
    wp_enqueue_script("bootstrap", get_template_directory_uri()."/js/bootstrap.min.js",array(),false,true);
    wp_enqueue_script("scrollIt", get_template_directory_uri()."/js/scrollIt.min.js",array(),false,true);
    wp_enqueue_script("jquery-waypoints", get_template_directory_uri()."/js/jquery.waypoints.min.js",array(),false,true);
    wp_enqueue_script("owl-carousel", get_template_directory_uri()."/js/owl.carousel.min.js",array(),false,true);
    wp_enqueue_script("jquery-stellar", get_template_directory_uri()."/js/jquery.stellar.min.js",array(),false,true);
    wp_enqueue_script("jquery-fancybox", get_template_directory_uri()."/js/jquery.fancybox.min.js",array(),false,true);
    wp_enqueue_script("savoye-YouTubePopUp", get_template_directory_uri()."/js/YouTubePopUp.js",array(),false,true);

    if(is_page_template('page-templates/coming-soon.php') ){
        wp_enqueue_script("savoye-validator", get_template_directory_uri()."/js/validator.js",array(),false,true);
    }

    if(!is_page_template('page-templates/onepage-light.php') and !is_page_template('page-templates/onepage-dark.php') and !is_page_template('page-templates/onepage-lightsidebar.php') and !is_page_template('page-templates/onepage-darksidebar.php') and !is_page_template('page-templates/multi-lightsidebar.php') and !is_page_template('page-templates/multi-darksidebar.php') and !is_page_template('page-templates/multi-dark.php')  and !is_page_template('page-templates/blog-dark.php') and !is_page_template('page-templates/blog-dark-2.php') and !is_page_template('page-templates/blog-darksidebar-1.php') and !is_page_template('page-templates/blog-darksidebar-2.php') and !is_page_template('page-templates/blog-lightsidebar-1.php') and !is_page_template('page-templates/blog-lightsidebar-2.php') and !is_singular( 'service' ) and !is_singular( 'project' ) and !is_singular( 'post' )){
//         wp_enqueue_script("savoye-custom", get_template_directory_uri()."/js/custom.js",array(),false,true);
		wp_enqueue_script( "savoye-custom-light", get_template_directory_uri()."/framework/logo-light.php");
    } 

    if(is_page_template('page-templates/multi-dark.php') or is_page_template('page-templates/blog-dark.php') or is_page_template('page-templates/blog-dark-2.php') ){
        // wp_enqueue_script( "savoye-custom-dark", get_template_directory_uri()."/js/dark/custom.js");
        wp_enqueue_script( "savoye-custom-dark11", get_template_directory_uri()."/framework/logo.php");
    }
    
    if(is_page_template('page-templates/blog-lightsidebar-1.php') or is_page_template('page-templates/blog-lightsidebar-2.php') or is_page_template('page-templates/multi-lightsidebar.php')  or is_page_template('page-templates/onepage-lightsidebar.php') or is_page_template('page-templates/blog-darksidebar-1.php') or is_page_template('page-templates/blog-darksidebar-2.php') or is_page_template('page-templates/multi-darksidebar.php')  or is_page_template('page-templates/onepage-darksidebar.php')  ){
        wp_enqueue_script( "savoye-custom-sidebar", get_template_directory_uri()."/js/sidebar/custom.js");
    }

    if(is_page_template('page-templates/onepage-light.php') ){
        
		wp_enqueue_script( "savoye-custom-onepagelight", get_template_directory_uri()."/framework/logo-onepage-light.php");
    }
    if(is_page_template('page-templates/onepage-dark.php') ){
        // wp_enqueue_script( "savoye-custom-onepagedark", get_template_directory_uri()."/js/onepage-dark/custom.js");
        wp_enqueue_script( "savoye-custom-onepagedark", get_template_directory_uri()."/framework/logo-onepage-dark.php");
    }
    if(is_page_template('page-templates/onepage-lightsidebar.php') or is_page_template('page-templates/onepage-darksidebar.php')){
        wp_enqueue_script( "savoye-custom-onepagesidebar", get_template_directory_uri()."/js/onepagesidebar/custom.js");
    }

    if( is_singular( 'service' ) or is_singular( 'project' ) or is_singular( 'post' ) ){
        wp_enqueue_script( "savoye-custom-single", get_template_directory_uri()."/js/single/custom.js");
    }
}
    
add_action( 'wp_enqueue_scripts', 'savoye_theme_scripts_styles' );
//Custom Excerpt Function
function savoye_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}  

// Widget Sidebar
function savoye_widgets_init() {
   register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'savoye' ),
    'id'            => 'sidebar-1',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'savoye' ),        
        'before_widget' => '<div class="col-md-12"><div id="%1$s" class="widget  %2$s" >',        
        'after_widget'  => '</div></div>',        
        'before_title'  => '<div class="widget-title"><h6>',        
        'after_title'   => '</h6></div>'
    ) );

   register_sidebar( array(
    'name'          => esc_html__( 'Service Sidebar', 'savoye' ),
    'id'            => 'sidebar-service',        
        'description'   => esc_html__( 'Appears in the sidebar section of single service.', 'savoye' ),        
        'before_widget' => '<div class="sidebar-widget help">
                            <div class="widget-inner">',        
        'after_widget'  => '</div></div>',        
        'before_title'  => '<div class="sidebar-title"><h5>',        
        'after_title'   => '</h5></div>'
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget 1', 'savoye' ),
    'id'            => 'footer-area-1',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'savoye' ),
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => '<div class="fothead"><h6>',
    'after_title'   => '</h6></div>',
  ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Widget 2', 'savoye' ),
    'id'            => 'footer-area-2',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'savoye' ),
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => '<div class="fothead"><h6>',
    'after_title'   => '</h6></div>',
  ) );

    register_sidebar( array(
    'name'          => esc_html__( 'Footer Sidebar Widget', 'savoye' ),
    'id'            => 'footer-area-4',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'savoye' ),
    'before_widget' => ' ',
    'after_widget'  => ' ',
    'before_title'  => '',
    'after_title'   => '',
  ) );
}
add_action( 'widgets_init', 'savoye_widgets_init' );

//function tag widgets
function savoye_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'savoye_tag_cloud_widget' );
function savoye_excerpt() {
  $savoye_redux_demo = get_option('redux_demo');
  if(isset($savoye_redux_demo['blog_excerpt'])){
    $limit = $savoye_redux_demo['blog_excerpt'];
  }else{
    $limit = 30;
  }
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

function savoye_pagination($pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
    'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
    'format'    => '',
    'current'     => max( 1, get_query_var('paged') ),
    'total'     => $pages,
    'prev_text' => wp_specialchars_decode(esc_html__( '<i class = "ti-angle-left"></i>', 'savoye' ),ENT_QUOTES),
    'next_text' => wp_specialchars_decode(esc_html__( '<i class = "ti-angle-right"></i>', 'savoye' ),ENT_QUOTES),
    'type'      => 'list',
    'end_size'    => 3,
    'mid_size'    => 3
);
    $return =  paginate_links( $pagination );
  echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
}

function savoye_search_form( $form ) {
    $form = '
    <form  method="get" action="' . esc_url(home_url('/')) . '"> 
      <input type="text"  placeholder="'.esc_attr__('Search', 'savoye').'" value="' . get_search_query() . '" name="s" > 
      <button type="submit"><i class="ti-search"></i></button>
    </form>
  	';
    return $form;
}
add_filter( 'get_search_form', 'savoye_search_form' );
//Custom comment List:

 
// Comment Form
function savoye_theme_comment($comment, $args, $depth) {
    //echo 's';
   $GLOBALS['comment'] = $comment; ?>
    <?php if(get_avatar($comment,$size='80' )!=''){?>
    <div class="savoye-post-comment-wrap">
        <div class="savoye-user-comment"> <?php echo get_avatar($comment,$size='80' ); ?> </div>
        <div class="savoye-user-content">
            <h6><?php printf( get_comment_author_link()) ?><span> <?php the_time(get_option( 'date_format' ));?></span></h3>
            <?php comment_text() ?>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
        </div>
    </div>
    <?php }else{?>
    <div class="savoye-post-comment-wrap">
        <div class="savoye-user-content">
            <h6><?php printf( get_comment_author_link()) ?><span> <?php the_time(get_option( 'date_format' ));?></span></h3>
            <?php comment_text() ?>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
        </div>
    </div>
<?php }?>

<?php
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'savoye_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function savoye_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'savoye' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'savoye' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'savoye' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'savoye' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'savoye' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'savoye' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'savoye' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Savoye Common', 'savoye' ),
            'slug'                     => 'savoye-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/savoye-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Savoye Elementor', 'savoye' ),
            'slug'                     => 'savoye-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/savoye-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'savoye' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'savoye' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'savoye' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'savoye' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'savoye' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'savoye' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'savoye' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'savoye' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'savoye' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'savoye' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'savoye' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'savoye' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'savoye' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'savoye' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'savoye' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'savoye' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'savoye' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>