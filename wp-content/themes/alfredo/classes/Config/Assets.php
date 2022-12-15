<?php

namespace Alfredo\Config;

class Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'registerStyles'));
        add_action('wp_enqueue_scripts', array($this, 'registerScripts'));
    }

    public function registerStyles()
    {
        wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0', 'all');
        wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), '1.0.0', 'all');
    }

    public function registerScripts()
    {
        wp_register_script('script', get_template_directory_uri() . '/dist/js/script.js', array(), '1.0.0', true);
        wp_enqueue_script('script');
        wp_localize_script('script', 'ajax_var', array(
            'url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('my-ajax-nonce'),
            'action' => 'ajax_search',
        ));
    }
}
