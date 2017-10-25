<?php

/*
	
@package learning template
	
	========================
		ADMIN PAGE
	========================
*/

function learning_add_admin_page() {
	
    //Generate Admin Page
	add_menu_page( 'Learning Theme Options', 'Learning', 'manage_options', 'learning_template', 'learning_theme_create_page', 'dashicons-admin-customizer', 110 );
	
    //Generate Admin SubPages
    add_submenu_page('learning_template', 'Learning Theme Options', 'General', 'manage_options', 'learning_template', 'learning_theme_create_page');
    add_submenu_page( 'learning_template', 'Learning CSS Options', 'Custom CSS', 'manage_options', 'learning_template_css', 'learning_theme_settings_page');
    
    //Custom Settings
    add_action('admin_init', 'learning_custom_settings');
}
add_action( 'admin_menu', 'learning_add_admin_page' );

function learning_custom_settings(){
    register_setting('learning-settings-group', 'first_name');
    register_setting('learning-settings-group', 'last_name');
    register_setting('learning-settings-group', 'twitter', 'learning_sanitize_twitter');
    register_setting('learning-settings-group', 'facebook');
    register_setting('learning-settings-group', 'instagram');
    
    add_settings_section('learning-sidebar-options', 'Sidebar options', 'learning_sidebar_options', 'learning_template');
    
    add_settings_field('sidebar-name', 'Name', 'learning_sidebar_name', 'learning_template', 'learning-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter', 'learning_sidebar_twitter', 'learning_template', 'learning-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook', 'learning_sidebar_facebook', 'learning_template', 'learning-sidebar-options');
    add_settings_field('sidebar-instagram', 'Instagram', 'learning_sidebar_instagram', 'learning_template', 'learning-sidebar-options');
    
}

function learning_sidebar_options(){
    echo "Constumize your Sidebar Information";
}

function learning_sidebar_name(){
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
	echo '  <input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />
            <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function learning_sidebar_twitter(){
    $twitter = esc_attr(get_option('twitter'));
	echo '  <input type="text" name="twitter" value="'.$twitter.'" placeholder="Twitter" />
            <p class="description">Input your Twitter username without the @ character.</p>';
}

function learning_sidebar_facebook(){
    $facebook = esc_attr(get_option('facebook'));
	echo '  <input type="text" name="facebook" value="'.$facebook.'" placeholder="Facebook" />';
}

function learning_sidebar_instagram(){
    $instagram = esc_attr(get_option('instagram'));
	echo '  <input type="text" name="instagram" value="'.$instagram.'" placeholder="Instagram" />';
}

//Sanitization settings
function learning_sanitize_twitter( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

function learning_theme_create_page() {
	require_once( get_template_directory() . '/inc/templates/learning-admin.php' );
}

function learning_theme_settings_page() {
	echo '<h1>Learning Custom CSS</h1>';
}