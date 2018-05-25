<?php
require_once( __DIR__ . '/vendor/autoload.php' );
$timber = new \Timber\Timber();

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

  function __construct() {
  
    add_filter( 'timber_context', array( $this, 'add_to_context' ) );
    add_action( 'init', array( $this, 'register_post_types' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'loadScripts' ) );
    parent::__construct();
  }

  function add_to_context( $context ) {
    $context['menu_primary'] = new TimberMenu('Menu Primary');
    $context['site'] = $this;
    return $context;
  }

  function register_post_types() {
		// Register Portfolio
    $portfolio_labels = array(
      'name'               => 'Portfolio',
      'singular_name'      => 'Portfolio Item',
      'menu_name'          => 'Portfolio'
    );
    $portfolio_args = array(
      'labels'             => $portfolio_labels,
      'public'             => true,
      'capability_type'    => 'post',
      'has_archive'        => true,
      'supports'           => array( 'title', 'thumbnail', 'revisions' ),
      'taxonomies'          => array( 'category')
    );
    register_post_type('portfolio', $portfolio_args);

    // Contact form
    $contacts_labels = array( 
      'name'          => 'Contacts',
      'singular_name' => 'Contact',
      'menu_name'     => 'Contacts'
    );
    $contacts_args = array(
      'labels'             => $contacts_labels,
      'public'             => true,
      'capability_type'    => 'post',
      'has_archive'        => true,
      'supports'           => array('title')
    );
    register_post_type('contacts', $contacts_args);

	}

  function loadScripts() {
    // bootstrap css
    wp_enqueue_style(
        'bootstrap-css' 
      , get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css'
    );
    // baevo css
    wp_enqueue_style(
      'baevo-style'
    , get_stylesheet_uri()
    );
    // popper
    wp_enqueue_script(
       'popper' 
      , get_template_directory_uri() . '/node_modules/popper.js/dist/popper.min.js'
      , array()
      , false
      , true
    );
    // jquery
    wp_enqueue_script(
       'jquery' 
      , get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js'
      , array()
      , false
      , true
    );
    // bootstrap js
    wp_enqueue_script(
        'bootstrap-js' 
      , get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js'
      , array()
      , false
      , true
    );
    // parsley
    wp_enqueue_script(
      'parsleyjs' 
      , get_template_directory_uri() . '/node_modules/parsleyjs/dist/parsley.min.js'
      , array()
      , false
      , true
    );
  } 

}

new StarterSite();

/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');

require_once( __DIR__ . '/inc/functions-contact-form.php' );