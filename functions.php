<?php 
//Metabox_CMB2===================================================
if(file_exists( __DIR__ . '/metabox/init.php')){
    require_once __DIR__ . '/metabox/init.php';
}
if(file_exists(__DIR__ . '/metabox/custom.php')){
    require_once __DIR__ . '/metabox/custom.php';
}


// Theme setup functions 
add_action('after_setup_theme', 'atzi_functions');
function atzi_functions() {

    // Text Domain 
    load_theme_textdomain('atzi', get_template_directory().'/lang');

    // Theme supports 
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('title-tag');
    add_theme_support( 'automatic-feed-links' );
    register_nav_menu('main-menu', __('Main Menu', 'atzi'));
    register_nav_menu('top-menu', __('Top Menu', 'atzi'));

    if ( ! isset( $content_width ) ) 
    $content_width = 900; 

}

//Modify Menu=================================================


//Adding new 'li' class
function add_additional_class($classes, $item, $args){
    if(isset($args->add_li_class)){
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class', 10, 3);


//adding new 'a' class
function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');



// Including the styles=============================================== 
add_action('wp_enqueue_scripts', 'atzi_styles');

function atzi_styles(){
    //======= VENDOR CSS FILES ======= 
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/plugins/bootstrap/bootstrap.min.css');
    wp_enqueue_style('slick', get_template_directory_uri().'/plugins/slick/slick.css');
    wp_enqueue_style('themify-icons', get_template_directory_uri().'/plugins/themify-icons/themify-icons.css');
    wp_enqueue_style('animate', get_template_directory_uri().'/plugins/animate/animate.css');
    wp_enqueue_style('aos', get_template_directory_uri().'/plugins/aos/aos.css');
    wp_enqueue_style('venobox', get_template_directory_uri().'/plugins/venobox/venobox.css');
    // ======= TEMPLATE MAIN CSS FILES ======= 
    wp_enqueue_style('template-css', get_template_directory_uri().'/css/style.css');
    wp_enqueue_style( "mailchimp-style-css", get_theme_file_uri("//cdn-images.mailchimp.com/embedcode/classic-10_7_dtp.css"), null, 1.0 );
        $style = <<<EOD
 #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif;  width:600px;}
EOD;
        wp_add_inline_style('mailchimp-style-css',$style);
    //Google fonts
    wp_enqueue_style( 'fonts-googleapis-com', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', false ); 
    wp_enqueue_style('stylesheet', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'atzi_scripts');

function atzi_scripts(){
    wp_enqueue_script('jquerymin', get_template_directory_uri().'/plugins/jQuery/jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap.min.js', get_template_directory_uri().'/plugins/bootstrap/bootstrap.min.js', array('jquery', 'jquerymin'), '', true);
    wp_enqueue_script('slick.min.js', get_template_directory_uri().'/plugins/slick/slick.min.js', array('jquery', 'jquerymin', 'bootstrap.min.js'), '', true);
    wp_enqueue_script('aos', get_template_directory_uri().'/plugins/aos/aos.js', array('jquery', 'jquerymin', 'bootstrap.min.js', 'slick.min.js'), '', true);
    wp_enqueue_script('venobox', get_template_directory_uri().'/plugins/venobox/venobox.min.js', array('jquery', 'jquerymin', 'bootstrap.min.js', 'slick.min.js', 'aos'), '', true);
    wp_enqueue_script('js', get_template_directory_uri().'/js/script.js', array('jquery', 'jquerymin', 'bootstrap.min.js', 'slick.min.js', 'aos', 'venobox'), '', true);




wp_enqueue_script( "mailchimp-js", get_theme_file_uri("//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"), array('jquery'), 1.0, true);
$script = <<<EOD
(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var \$mcj = jQuery.noConflict(true);
EOD;
        wp_add_inline_script('mailchimp-js',$script);







}

// Post Views count
    function getPostViews($postID){
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0 View";
        }
        return $count;
    }
    function setPostViews($postID) {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
    // Remove issues with prefetching adding extra views
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//End Post Views count

//Suggested Blog Post
function my_related_posts() {
    $args = array(
        'posts_per_page' => 3,
        'post_in' => get_the_tag_list()
    );
    $the_query = new WP_Query( $args );
     while( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
          <?php the_post_thumbnail('full', array('class' => 'card-img-top rounded-0')); ?>
          <div class="card-body">
            <!-- POST META -->
            <ul class="list-inline mb-3">
              <!-- POST DATE -->
              <li class="list-inline-item mr-3 ml-0"><?php the_time('F d, Y'); ?></li>
              <!-- AUTHOR -->
              <li class="list-inline-item mr-3 ml-0">By <?php the_author(); ?></li>
            </ul>
            <a href="<?php the_permalink(); ?>">
              <h4 class="card-title"><?php the_title(); ?></h4>
            </a>
            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 7, ''); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">read more</a>
          </div>
        </div>
      </article>

    <?php endwhile; 
    wp_reset_postdata();
}

//Comment form========================================================
    
function atzi_comment_field($fields){
    $comment = $fields['comment'];
    $author = $fields['author'];
    $email = $fields['email'];
    $url = $fields['url'];
    $cookies = $fields['cookies'];


    unset($fields['comment']);
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    unset($fields['cookies']);

    $fields['author'] = $author;
    $fields['email'] = $email;
    $fields['comment'] = $comment;

    return $fields;
}
add_filter('comment_form_fields', 'atzi_comment_field');


//Home Template Editor Hide================================================================
function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'templates/home.php':
            // the below removes 'editor' support for 'pages'
            // if you want to remove for posts or custom post types as well
            // add this line for posts:
            // remove_post_type_support('post', 'editor');
            // add this line for custom post types and replace 
            // custom-post-type-name with the name of post type:
            // remove_post_type_support('custom-post-type-name', 'editor');
            remove_post_type_support('page', 'editor');
            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('init', 'remove_editor');


// Register Sidebars====================================================================
function atzi_custom_sidebars() {

    $args = array(
        'id'            => 'footer1',
        'name'          => __( 'Footer 1', 'atzi' ),
        );
    register_sidebar( $args );


    $args2 = array(
        'id'            => 'footer2',
        'name'          => __( 'Footer 2', 'atzi' ),
    );
    register_sidebar( $args2 );

    $args3 = array(
        'id'            => 'footer3',
        'name'          => __( 'Footer 3', 'atzi' ),
    );
    register_sidebar( $args3 );

    $args4 = array(
        'id'            => 'footer4',
        'name'          => __( 'Footer 4', 'atzi' ),
    );
    register_sidebar( $args4 );

    $args5 = array(
        'id'            => 'footer5',
        'name'          => __( 'Footer 5', 'atzi' ),
    );
    register_sidebar( $args5 );

}
add_action( 'widgets_init', 'atzi_custom_sidebars' );



//Woocommerce=======================================================
//archive-product.php
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');

function woocommerce_output_content_wrapper(){
    echo "<!-- TRAINING START -->
            <section class='section'>
                <div class='container'>
          <!-- TRAINING LIST START -->
                    <div class='row justify-content-center'>";
}

remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');
add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');

function woocommerce_output_content_wrapper_end(){
    echo "      </div>
        <!-- TRAINING LIST END -->
            </div'>
        </section>
        <!-- TRAINING END -->";
}

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Apply Now', 'atzi' ); 
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Apply Now', 'atzi' );
}

// TGMPA
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'atzi_register_required_plugins' );
function atzi_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
        array(
            'name'      => 'Woocommerce',
            'slug'      => 'woocommerce',
            'required'  => true,
        ),
        // This is an example of how to include a plugin bundled with a theme.
        array(
            'name'               => 'ATZI Custom Post Type', // The plugin name.
            'slug'               => 'atzi-custom-post-type', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/plugins/atzi-custom-post-type.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),

    );

    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}
