<?php 


/**
 * mvlinowskv's functions and definitions
 *
 * @package mvlinowskv
 * @since mvlinowskv
 */
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */



// Make Custom Post Type
function osoba_init() {
    // set up product labels
    $labels = array(
        'name' => 'Osoby',
        'singular_name' => 'Osoba',
        'add_new' => 'Add New Osoba',
        'add_new_item' => 'Add New Osoba',
        'edit_item' => 'Edit Osoba',
        'new_item' => 'New Osoba',
        'all_items' => 'All Osoby',
        'view_item' => 'View Osoba',
        'search_items' => 'Search Osoby',
        'not_found' =>  'Nie znaleziono',
        'not_found_in_trash' => 'Nie znaleziono', 
        'parent_item_colon' => '',
        'menu_name' => 'Osoby',
    );
    
    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'osoby'),
        'query_var' => true,
        'menu_icon' => 'dashicons-randomize',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes'
        )
    );
    register_post_type( 'osoby', $args );
    
    // register taxonomy
    register_taxonomy('osoba_category', 'osoba', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array( 'slug' => 'osoba-category' )));
}
add_action( 'init', 'osoba_init' );

function wordpressify_resources()
{


    wp_enqueue_script('footer_js', get_template_directory_uri() . '/assets/js/footer-bundle.js', array('jquery'), 1.2, true);
	wp_localize_script(
        'footer_js',
        'my_ajax_object',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        )
    );
}

add_action('wp_enqueue_scripts', 'wordpressify_resources');

function add_person()
{
    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $email = $_POST['email'];
	$phone = $_POST['phone'];
    $ajax = false;
    //check ajax call or not
    if (
        !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
    ) {
        $ajax = true;
    }

    $title = $name." ".$vorname;
    $new_post = array(
		        'post_title'    => $title,
		        'post_status'   => 'draft',           // Choose: publish, preview, future, draft, etc.
		        'post_type' => 'osoby'  //'post',page' or use a custom post type if you want to
		   );
		    //save the new post
	$pid = wp_insert_post($new_post); 
	add_post_meta($pid, 'name', $name, true);
    add_post_meta($pid, 'vorname', $vorname, true);
    add_post_meta($pid, 'email', $email, true);
    add_post_meta($pid, 'phone', $phone, true);
    if ($ajax) die();
	}

add_action('wp_ajax_add_person', 'add_person');
add_action('wp_ajax_nopriv_add_person', 'add_person');

function admin_bar(){

    if(is_user_logged_in()){
      add_filter( 'show_admin_bar', '__return_true' , 1000 );
    }
  }
  add_action('init', 'admin_bar' );