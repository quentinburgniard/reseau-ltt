<?php
/**
 * @package Réseau_LTT
 */
/*--------------------------------------------------------------
Add CSS & JS
--------------------------------------------------------------*/
function scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/lib/normalize.min.css');
    wp_enqueue_style( 'general', get_template_directory_uri().'/css/general.css');
    wp_enqueue_style( 'header', get_template_directory_uri().'/css/header.css');
    wp_enqueue_style( 'footer', get_template_directory_uri().'/css/footer.css');

    if( is_front_page() ) { wp_enqueue_style( 'accueil', get_template_directory_uri().'/css/specific/front-page.css'); }

    if( is_page() ) {
        if (is_page(40)) {
            wp_enqueue_style('qui-sommes-nous', get_template_directory_uri() . '/css/specific/page-who-are-we.css');
        }
        elseif (is_page(73)){
            wp_enqueue_style('archive-post', get_template_directory_uri() . '/css/specific/archive-post.css');
        }
        elseif (is_page(44)){
            wp_enqueue_style('contact', get_template_directory_uri() . '/css/specific/page-contact.css');
        }
        else {
            wp_enqueue_style('page', get_template_directory_uri() . '/css/specific/page.css');
        }
    }

    if( is_post_type_archive( 'annuaire' ) ) {
        wp_enqueue_style( 'archive-annuaire', get_template_directory_uri().'/css/specific/archive-annuaire.css');
    }

    if( is_singular( 'annuaire' ) ) {
        wp_enqueue_style( 'single-annuaire', get_template_directory_uri().'/css/specific/single-annuaire.css');
    }

    if( is_singular( 'post' )  ) {
        wp_enqueue_style( 'single-post', get_template_directory_uri().'/css/specific/single-post.css');
    }

    wp_enqueue_script( 'jquery-3.1.1', get_template_directory_uri().'/js/lib/jquery-3.1.1.min.js', '', '', true);
    wp_enqueue_script( 'velocity', get_template_directory_uri().'/js/lib/velocity.min.js', '', '', true);
    wp_enqueue_script( 'main', get_template_directory_uri().'/js/main.js', '', '', true);

    wp_deregister_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'scripts' );
/*--------------------------------------------------------------
Remove WP Informations & Emoji
--------------------------------------------------------------*/
function remove_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_filter( 'style_loader_src', 'remove_ver', 1000 );
add_filter( 'script_loader_src', 'remove_ver', 1000 );
/*--------------------------------------------------------------
Add Custom Post Type Chercheurs
--------------------------------------------------------------*/
function create_post_type() {
    register_post_type( 'annuaire',
        array(
            'labels' => array(
                'name' => __( 'Annuaire des chercheurs' ),
                'singular_name' => __( 'Annuaire' ),
                'add_new' => __( 'Ajouter' ),
                'add_new_item' => __( 'Ajouter un nouveau chercheur' ),
                'edit_item' => __( 'Modifier' ),
                'new_item' => __( 'Nouveau chercheur' ),
                'view_item' => __( 'Voir le chercheur' ),
                'view_items' => __( 'Voir annuaire' ),
                'search_items' => __( 'Rechercher un chercheur' ),
                'not_found' =>  __( 'Aucun chercheur' ),
                'not_found_in_trash' => __( 'Aucun chercheur dans la corbeille' ),
                'menu_name' => __( 'Annuaire' )
            ),
            'public' => true,
            'has_archive' => true,
            'capabilities' => array(
                'edit_post' => 'edit_member',
                'edit_posts' => 'edit_members',
                'edit_others_posts' => 'edit_other_members',
                'publish_posts' => 'publish_members',
                'read_post' => 'read_member',
                'read_private_posts' => 'read_private_members',
                'delete_post' => 'delete_member'
            ),
            'menu_icon' => 'dashicons-businessman'
        )
    );

    register_taxonomy(
        'pays',
        'annuaire',
        array(
            'hierarchical' => false,
            'label' => 'Pays',
            'query_var' => true,
            'rewrite' => true,
            'capabilities' => array(
                'manage_terms' => 'manage_pays',
                'edit_terms' => 'edit_pays',
                'delete_terms' => 'delete_pays',
                'assign_terms' => 'assign_pays',
            )
        )
    );

    register_taxonomy(
        'etablissement',
        'annuaire', array(
            'hierarchical' => false,
            'label' => 'Établissement',
            'query_var' => true,
            'rewrite' => true,
            'capabilities' => array(
                'manage_terms' => 'manage_etablissement',
                'edit_terms' => 'edit_etablissement',
                'delete_terms' => 'delete_etablissement',
                'assign_terms' => 'assign_etablissement'
            )
        )
    );
}

add_action( 'init', 'create_post_type' );
/*--------------------------------------------------------------
Add Custom Placeholder Title
--------------------------------------------------------------*/
function custom_placeholder_title($title){
    $screen = get_current_screen();

    if ($screen->post_type == 'annuaire') {
        $title = __('Prénom Nom', 'TEXT_DOMAIN');
    }

    return $title;
}
add_filter('enter_title_here', 'custom_placeholder_title');
/*--------------------------------------------------------------
Add Image Crop
--------------------------------------------------------------*/
add_image_size( 'front-actuality-img', 220, 150, false );
/*--------------------------------------------------------------
Add Post Thumbnail
--------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );
/*--------------------------------------------------------------
Author & Administrator Capacibility Customization
--------------------------------------------------------------*/
function set_capabilities() {

    $author = get_role( 'author' );
    $administrator = get_role( 'administrator' );

    $administrator_add_caps = array(
        'edit_member',
        'edit_members',
        'edit_other_members',
        'publish_members',
        'read_member',
        'read_private_members',
        'delete_member',
        'assign_pays',
        'manage_pays',
        'edit_pays',
        'delete_pays',
        'assign_etablissement',
        'manage_etablissement',
        'edit_etablissement',
        'delete_etablissement',
    );

    $author_add_caps = array(
        'read',
        'edit_members',
        'publish_members',
        'read_private_members',
        'edit_member',
        'assign_pays',
        'assign_etablissement'
    );

    $author_remove_caps = array(
        'edit_published_posts',
        'publish_posts',
        'delete_published_posts',
        'edit_posts',
        'delete_posts',
        'upload_files',
        'edit_dashboard',
        'manage_pays',
        'edit_pays',
        'delete_pays',
        'manage_etablissement',
        'edit_etablissement',
        'delete_etablissement',

    );

    foreach ( $administrator_add_caps as $cap ) {

        $administrator->add_cap( $cap );
    }

    foreach ( $author_add_caps as $cap ) {

        $author->add_cap( $cap );
    }

    foreach ( $author_remove_caps as $cap ) {

        $author->remove_cap( $cap );
    }
}
add_action( 'init', 'set_capabilities' );
/*--------------------------------------------------------------
Title WordPress Implementation
--------------------------------------------------------------*/
function theme_support() {
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_support' );
/*--------------------------------------------------------------
WYSIWYG
--------------------------------------------------------------*/
function TinyMCE( $paremeters ) {
    $paremeters['block_formats'] = "Paragraph=p; Titre=h3; Sous-titre=h4";
    return $paremeters;
}
/*--------------------------------------------------------------
Customize Login Form
--------------------------------------------------------------*/
function login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            width: 196px;

            background-image: url(<?php echo get_template_directory_uri(); ?>/img/logo-ltt-admin.png);
            background-size: auto;
        }
    </style>
<?php } ?>
<?php add_action( 'login_enqueue_scripts', 'login_logo' );

function login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url_title() {
    return 'Réseau LTT';
}
add_filter( 'login_headertitle', 'login_logo_url_title' );