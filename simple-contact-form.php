<?php

/**
 * Plugin Name: Simple Contact Form 
 * Description: Simple Contact Form 
 * Author: RR
 * Version: 1.0.0
 * Text Domain: simple-contact-form
 * 
 */

 //if the absolute path is used NOT being used to access this plugin, then exit query 
if(!defined('ABSPATH'))
{
    echo 'What are your trying to do?';
    exit;
}


class SimpleContactForm {
    //first method called
    public function __construct()
    {
        //Create custom post type
        add_action('init', array($this, 'create_custom_post_type'));

        //Add assets (js, css, etc)
        add_action('wp_enqueue_scripts', array($this, 'load_assets'))
    
    }
    //creating custom post type.
    public function create_custom_post_type()
    {
        $args = array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'exclude_from_search' => true,//will exclude from website search
            'publicly_queryable' => false, //can only access from admin area 
            'capability' => 'manage_options',//capability of admin
           'labels' => array(
                'name' => 'Contact Form',
                'singular_name' => 'Contact Form Entry'
            ),
            'menu_icon' => 'dashicons-media-text',

            
        );
        register_post_type('simple_contact_form', $args);

    }

    public function load_assets()
    {

    }

}

new SimpleContactForm;

