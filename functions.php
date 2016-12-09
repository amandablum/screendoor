<?php

/**

 * sd functions and definitions

 *

 * @package sd

 * @since sd 1.0

 */



/**

 * Set the content width based on the theme's design and stylesheet.

 *

 * @since sd 1.0

 */

if ( ! isset( $content_width ) )

    $content_width = 640; /* pixels */



if ( ! function_exists( 'hana_setup' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which runs

 * before the init hook. The init hook is too late for some features, such as indicating

 * support post thumbnails.

 *

 * @since hana 1.0

 */

function hana_setup() {



    /**

     * Custom template tags for this theme.

     */

    require( get_template_directory() . '/inc/template-tags.php' );



    /**

     * Custom functions that act independently of the theme templates

     */

    require( get_template_directory() . '/inc/extras.php' );



    /**

     * Customizer additions

     */

    require( get_template_directory() . '/inc/customizer.php' );



    /**

     * Make theme available for translation

     * Translations can be filed in the /languages/ directory

     * If you're building a theme based on hana, use a find and replace

     * to change 'hana' to the name of your theme in all the template files

     */

    load_theme_textdomain( 'hana', get_template_directory() . '/languages' );



    /**

     * Add default posts and comments RSS feed links to head

     */

    add_theme_support( 'automatic-feed-links' );



    /**

     * Enable support for Post Thumbnails

     */

    add_theme_support( 'post-thumbnails' );



    /**

     * This theme uses wp_nav_menu() in one location.

     */

    register_nav_menus( array(

        'primary' => __( 'Primary Menu', 'hana' ),

	'extra-menu' => __( 'Menu Page' )

	    ) );



    /**

     * Enable support for Post Formats

     */

    add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

}

endif; // hana_setup

add_action( 'after_setup_theme', 'hana_setup' );



add_filter('widget_text', 'do_shortcode');



/**

 * Register widgetized area and update sidebar with default widgets

 *

 * @since screendoor 1.0

 */

function screendoor_widgets_init() {

       register_sidebar( array(

        'name' => __( 'Sitewide Footer Left', 'screendoor' ),

        'id' => 'sitewide_footer_left',

	'description'   => __( 'this is the leftmost footer column', 'text_domain' ),

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ) );

    register_sidebar( array(

        'name' => __( 'Sitewide Footer Middle', 'screendoor' ),

        'id' => 'sitewide_footer_middle',

	'description'   => __( 'this is the center footer column', 'text_domain' ),

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ) );

 register_sidebar( array(

        'name' => __( 'Sitewide Footer Right', 'screendoor' ),

        'id' => 'sitewide_footer_right',

	'description'   => __( 'this is the rightmost footer column', 'text_domain' ),

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ) );



       register_sidebar( array(

        'name' => __( 'Homepage About Section', 'screendoor' ),

        'id' => 'homepageabout',

	'description'   => __( 'this is the section of the homepage after you scroll down', 'text_domain' ),

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ) );

       register_sidebar( array(

        'name' => __( 'Homepage Mobile Information', 'screendoor' ),

        'id' => 'mobhomewid',

	'description'   => __( 'for mobile only-this is the section of the homepage after you scroll down', 'text_domain' ),

        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

        'after_widget' => '</aside>',

        'before_title' => '<h1 class="widget-title">',

        'after_title' => '</h1>',

    ) );

}

add_action( 'widgets_init', 'screendoor_widgets_init' );



/**

 * Enqueue scripts and styles

 */

function hana_scripts() {

    wp_enqueue_style( 'style', get_stylesheet_uri() );



    wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );



    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

        wp_enqueue_script( 'comment-reply' );

    }



    if ( is_singular() && wp_attachment_is_image() ) {

        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );

    }

}

add_action( 'wp_enqueue_scripts', 'hana_scripts' );



/**

 * WooCommerce stuff

 */



add_action( 'after_setup_theme', 'woocommerce_support' );

function woocommerce_support() {

    add_theme_support( 'woocommerce' );

}



remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart', 30 );



remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );



add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +

 

function woo_custom_cart_button_text() {

 

        return __( 'Order Now', 'woocommerce' );

 }



add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt', 5);









/**

 * Implement the Custom Header feature

 */

//require( get_template_directory() . '/inc/custom-header.php' );



//start weekday breakfast





add_action('init', 'wdbreakitem_register');

 



function wdbreakitem_register() {

    $labels = array(

        'name' =>  _x('Weekday B-fast', 'post type general name'),

        'singular_name' =>  _x('Weekday Breakfast Item', 'post type singular name'),

        'add_new' =>  _x('Add New', 'Weekday Breakfast Item'),

        'add_new_item' =>  __('Add New Weekday Breakfast Item'),

        'edit_item' => __('Edit Weekday BreakfastItem'),

        'new_item' =>  __('New Weekday Breakfast Item'),

        'view_item' =>  __('View Weekday Breakfast Item'),

        'search_items' =>  __('Search Weekday Breakfast Item'),

        'not_found' =>  __('Nothing found'),

        'not_found_in_trash' =>  __('Nothing found in Trash'),

        'parent_item_colon' =>  ''

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'query_var' => true,

        'rewrite' => true,

        'capability_type' => 'post',

        'has_archive' => true, 

        'hierarchical' => false,

        'menu_position' => null,

        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),

        'taxonomies' => array('category') // this is IMPORTANT

      ); 



    register_post_type( 'wdbreakitems' , $args );

    flush_rewrite_rules();



}

 



//start weekday lunch



add_action('init', 'wdlunchitem_register');

 



function wdlunchitem_register() {

    $labels = array(

        'name' =>  _x('Weekday Lunch', 'post type general name'),

        'singular_name' =>  _x('Weekday Lunch  Item', 'post type singular name'),

        'add_new' =>  _x('Add New', 'Weekday Lunch  Item'),

        'add_new_item' =>  __('Add New Weekday Lunch  Item'),

        'edit_item' => __('Edit Weekday Lunch Item'),

        'new_item' =>  __('New Weekday Lunch  Item'),

        'view_item' =>  __('View Weekday Lunch  Item'),

        'search_items' =>  __('Search Weekday Lunch  Item'),

        'not_found' =>  __('Nothing found'),

        'not_found_in_trash' =>  __('Nothing found in Trash'),

        'parent_item_colon' =>  ''

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'query_var' => true,

        'rewrite' => true,

        'capability_type' => 'post',

        'has_archive' => true, 

        'hierarchical' => false,

        'menu_position' => null,

        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),

        'taxonomies' => array('category') // this is IMPORTANT

      ); 



    register_post_type( 'wdlunchitems' , $args );

    flush_rewrite_rules();



}



//start weekend brunch



add_action('init', 'webrunchitem_register');

 



function webrunchitem_register() {

    $labels = array(

        'name' =>  _x('Weekend Brunch', 'post type general name'),

        'singular_name' =>  _x('Weekend Brunch Item', 'post type singular name'),

        'add_new' =>  _x('Add New', 'Weekend Brunch Item'),

        'add_new_item' =>  __('Add New Weekend Brunch Item'),

        'edit_item' => __('Edit Weekend Brunch Item'),

        'new_item' =>  __('New Weekend Brunch Item'),

        'view_item' =>  __('View Weekend Brunch Item'),

        'search_items' =>  __('Search Weekend Brunch Item'),

        'not_found' =>  __('Nothing found'),

        'not_found_in_trash' =>  __('Nothing found in Trash'),

        'parent_item_colon' =>  ''

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'query_var' => true,

        'rewrite' => true,

        'capability_type' => 'post',

        'has_archive' => true, 

        'hierarchical' => false,

        'menu_position' => null,

        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),

        'taxonomies' => array('category') // this is IMPORTANT

      ); 



    register_post_type( 'webrunchitems' , $args );

    flush_rewrite_rules();



}



//start dinner



add_action('init', 'dinneritem_register');

 



function dinneritem_register() {

    $labels = array(

        'name' =>  _x('Dinner', 'post type general name'),

        'singular_name' =>  _x('Dinner Item', 'post type singular name'),

        'add_new' =>  _x('Add New', 'Dinner Item'),

        'add_new_item' =>  __('Add New Dinner Item'),

        'edit_item' => __('Edit Dinner Item'),

        'new_item' =>  __('New Dinner Item'),

        'view_item' =>  __('View Dinner Item'),

        'search_items' =>  __('Search Dinner Item'),

        'not_found' =>  __('Nothing found'),

        'not_found_in_trash' =>  __('Nothing found in Trash'),

        'parent_item_colon' =>  ''

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'query_var' => true,

        'rewrite' => true,

        'capability_type' => 'post',

        'has_archive' => true, 

        'hierarchical' => false,

        'menu_position' => null,

        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),

        'taxonomies' => array('category') // this is IMPORTANT

      ); 



    register_post_type( 'dinneritems' , $args );

    flush_rewrite_rules();



}



//start dessert



add_action('init', 'dessertitem_register');

 



function dessertitem_register() {

    $labels = array(

        'name' =>  _x('Dessert', 'post type general name'),

        'singular_name' =>  _x('Dessert Item', 'post type singular name'),

        'add_new' =>  _x('Add New', 'Dessert Item'),

        'add_new_item' =>  __('Add New Dessert Item'),

        'edit_item' => __('Edit Dessert Item'),

        'new_item' =>  __('New Dessert Item'),

        'view_item' =>  __('View Dessert Item'),

        'search_items' =>  __('Search Dessert Item'),

        'not_found' =>  __('Nothing found'),

        'not_found_in_trash' =>  __('Nothing found in Trash'),

        'parent_item_colon' =>  ''

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'query_var' => true,

        'rewrite' => true,

        'capability_type' => 'post',

        'has_archive' => true, 

        'hierarchical' => false,

        'menu_position' => null,

        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),

        'taxonomies' => array('category') // this is IMPORTANT

      ); 



    register_post_type( 'dessertitems' , $args );

    flush_rewrite_rules();



}



//start vegetables



add_action('init', 'vegitem_register');

 



function vegitem_register() {

    $labels = array(

        'name' =>  _x('Veg Specials', 'post type general name'),

        'singular_name' =>  _x('Vegetable Item', 'post type singular name'),

        'add_new' =>  _x('Add New', 'Vegetable Item'),

        'add_new_item' =>  __('Add New Vegetable Item'),

        'edit_item' => __('Edit Vegetable Item'),

        'new_item' =>  __('New Vegetable Item'),

        'view_item' =>  __('View Vegetable Item'),

        'search_items' =>  __('Search Vegetable Item'),

        'not_found' =>  __('Nothing found'),

        'not_found_in_trash' =>  __('Nothing found in Trash'),

        'parent_item_colon' =>  ''

    );



    $args = array(

        'labels' => $labels,

        'public' => true,

        'publicly_queryable' => true,

        'show_ui' => true,

        'query_var' => true,

        'rewrite' => true,

        'capability_type' => 'post',

        'has_archive' => true, 

        'hierarchical' => false,

        'menu_position' => null,

        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),

        'taxonomies' => array('category') // this is IMPORTANT

      ); 



    register_post_type( 'vegitems' , $args );

    flush_rewrite_rules();



}







//hook into the init action and call create_menuitem_taxonomies when it fires

add_action( 'init', 'create_wdlunchitem_taxonomies', 0 );



//create taxonomy- Price for all CPTS



function create_wdlunchitem_taxonomies() {

  // Add new taxonomy, NOT hierarchical (like tags)

  $labels = array(

    'name' => _x( 'Price', 'taxonomy general name' ),

    'singular_name' => _x( 'Price', 'taxonomy singular name' ),

    'search_items' =>  __( 'Search Prices' ),

    'popular_items' => __( 'Popular Prices' ),

    'all_items' => __( 'All Prices' ),

    'parent_item' => null,

    'parent_item_colon' => null,

    'edit_item' => __( 'Edit  Price' ), 

    'update_item' => __( 'Update Price' ),

    'add_new_item' => __( 'Add New Price' ),

    'new_item_name' => __( 'New Price' ),

    'separate_items_with_commas' => __( 'enter one price with $ and decimal, like $5.00' ),

    'add_or_remove_items' => __( 'Add or remove Prices' ),

    'choose_from_most_used' => __( 'Choose from the most used Prices' ),

    'menu_name' => __( 'Price' ),

  ); 



register_taxonomy('price',array('wdbreakitems', 'wdlunchitems', 'webrunchitems', 'dinneritems','dessertitems', 'vegitems'), array(   //add all CPTs here

    'hierarchical' => false,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'update_count_callback' => '_update_post_term_count',

    'query_var' => true,

    'rewrite' => array( 'slug' => 'price' ),

  ));



// Add new taxonomy, NOT hierarchical (like tags)

  $labels = array(

    'name' => _x( 'Item Notes', 'taxonomy general name' ),

    'singular_name' => _x( 'Item Note', 'taxonomy singular name' ),

    'search_items' =>  __( 'Search Item Notes' ),

    'popular_items' => __( 'Popular Item Notes' ),

    'all_items' => __( 'All Item Notes' ),

    'parent_item' => null,

    'parent_item_colon' => null,

    'edit_item' => __( 'Edit Item Note' ), 

    'update_item' => __( 'Update Item Note' ),

    'add_new_item' => __( 'Add New Item Note' ),

    'new_item_name' => __( 'New Item Note' ),

    'separate_items_with_commas' => __( 'Separate Item Notes with commas' ),

    'add_or_remove_items' => __( 'Add or remove Item Notes' ),

    'choose_from_most_used' => __( 'Choose from the most used Item Notes' ),

    'menu_name' => __( 'Item Notes' ),

  ); 



register_taxonomy('item_notes',array('wdbreakitems', 'wdlunchitems', 'webrunchitems', 'dinneritems', 'dessertitems', 'vegitems'), array(   //add all CPTs here



  'hierarchical' => false,

    'labels' => $labels,

    'show_ui' => true,

 'has_archive' => true,

    'show_admin_column' => true,

    'update_count_callback' => '_update_post_term_count',

    'query_var' => true,

    'rewrite' => array( 'slug' => 'itemnote' ),

  ));









function wdbreak_add_taxonomy_filters() {

    global $typenow;

 

    // an array of all the taxonomies you want to display. Use the taxonomy name or slug

    $taxonomies = array('menu_group');

 

    // must set this to the post type you want the filter(s) displayed on

    if( $typenow == 'wdbreakitems' ){

 

        foreach ($taxonomies as $tax_slug) {

            $tax_obj = get_taxonomy($tax_slug);

            $tax_name = $tax_obj->labels->name;

            $terms = get_terms($tax_slug);

            if(count($terms) > 0) {

                echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";

                echo "<option value=''>Show All $tax_name</option>";

                foreach ($terms as $term) { 

                    echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 

                }

                echo "</select>";

            }

        }

    }

}

add_action( 'restrict_manage_posts', 'wdbreak_add_taxonomy_filters' );



function wdlunch_add_taxonomy_filters() {

    global $typenow;

 

    // an array of all the taxonomies you want to display. Use the taxonomy name or slug

    $taxonomies = array('menu_group');

 

    // must set this to the post type you want the filter(s) displayed on

    if( $typenow == 'wdlunchitems' ){

 

        foreach ($taxonomies as $tax_slug) {

            $tax_obj = get_taxonomy($tax_slug);

            $tax_name = $tax_obj->labels->name;

            $terms = get_terms($tax_slug);

            if(count($terms) > 0) {

                echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";

                echo "<option value=''>Show All $tax_name</option>";

                foreach ($terms as $term) { 

                    echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 

                }

                echo "</select>";

            }

        }

    }

}

add_action( 'restrict_manage_posts', 'wdlunch_add_taxonomy_filters' );



}

// theme support for BG image

$args = array(

	'default-color' => 'ffffff',

	'default-image' => '',

);

add_theme_support( 'custom-background', $args );



/** 

 * Snippet Name: Remove wpautop only for custom post types 

 * Snippet URL: http://www.wpcustoms.net/snippets/remove-wpautop-custom-post-types/ 

 */  

 function wpc_remove_autop_for_posttype( $content )  

{  

    // edit the post type here  

    'wdbreakitems' === get_post_type() && remove_filter( 'the_content', 'wpautop' );  

    'wdlunchitems' === get_post_type() && remove_filter( 'the_content', 'wpautop' ); 

    'webrunchitems' === get_post_type() && remove_filter( 'the_content', 'wpautop' );  

    'dinneritems' === get_post_type() && remove_filter( 'the_content', 'wpautop' );

    'vegitems' === get_post_type() && remove_filter( 'the_content', 'wpautop' );

    'products' === get_post_type() && remove_filter( 'the_content', 'wpautop' );

    'dessertitems' === get_post_type() && remove_filter( 'the_content', 'wpautop' );

    return $content;  

}  

add_filter( 'the_content', 'wpc_remove_autop_for_posttype', 0 );  



if ( 'custom_wppost' == $_POST['vegitems'] ) {

  wp_set_post_categories( $post_ID, array(24) );

}





function save_veg_meta( $post_id, $post, $update ) {



    $slug = 'vegitems'; //Slug of CPT



    // If this isn't a 'veg' post, don't update it.

    if ( $slug != $post->post_type ) {

        return;

    }



    wp_set_object_terms( get_the_ID(), 24, category );

}



add_action( 'save_post', 'save_veg_meta', 10, 3 );

      

function custom_mtypes( $m ){

    $m['svg'] = 'image/svg+xml';

    $m['svgz'] = 'image/svg+xml';

    return $m;

}

add_filter( 'upload_mimes', 'custom_mtypes' );

add_filter('wp_handle_upload_prefilter', 'f711_image_size_prevent');
function f711_image_size_prevent($file) {
    $size = $file['size'];
    $size = $size / 1024; // Calculate down to KB
    $type = $file['type'];
    $is_image = strpos($type, 'image');
    $limit = 65; // Your Filesize in KB

    if ( ( $size > $limit ) && ($is_image !== false) ) {
        $file['error'] = 'David stop trying to upload huge images, they look fine below '.$limit.'KB';
    }

    return $file;

}

?>