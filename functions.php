<?php
require_once( __DIR__ . '/vendor/autoload.php' );
$timber = new \Timber\Timber();

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

  function __construct() {
  
    add_filter( 'timber_context', array( $this, 'add_to_context' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'loadScripts' ) );
    parent::__construct();
  }

  function add_to_context( $context ) {
    //$context['menu_primary'] = new TimberMenu('Primary Navigation');
    $context['site'] = $this;
    return $context;
  }

  function loadScripts() {
    /*
    wp_enqueue_style(
        'bootstrap-css' 
      , get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css'
    );
    wp_enqueue_script(
       'jquery' 
      , get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js'
      , array()
      , false
      , true
    );
    wp_enqueue_script(
        'bootstrap-js' 
      , get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js'
      , array()
      , false
      , true
    );
    wp_enqueue_script(
      'parsleyjs' 
      , get_template_directory_uri() . '/node_modules/parsleyjs/dist/parsley.min.js'
      , array()
      , false
      , true
    );
    */
    wp_enqueue_style(
        'baevo-style'
      , get_stylesheet_uri()
    );
  } 

}

new StarterSite();

/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');