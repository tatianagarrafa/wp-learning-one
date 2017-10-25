<?php

/*
	
@package learning template
	
	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function learning_load_admin_scripts($hook){
    
    if('toplevel_page_learning_template' != $hook){
        return;
    }
    wp_register_style('learning_admin', get_template_directory_uri() . '/assets/css/learning.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('learning_admin');
    
    wp_enqueue_media();
    
    wp_register_script('learning_admin_script', get_template_directory_uri() . '/assets/js/learning.admin.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('learning_admin_script');
}

add_action('admin_enqueue_scripts', 'learning_load_admin_scripts');