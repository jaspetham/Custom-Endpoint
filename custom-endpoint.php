<?php

 /*
   Plugin Name:Custom Endpoint
   Plugin URI: http:/shopreview.online
   description: a plugin to create for custom endpoint to view user table
   Version: 1.2
   Author: Jasper Tham
   License: GPL2
   */

global $wp_session;
add_action('admin_menu', 'test_plugin_setup_menu');

function wl_users() {
   session_start();
   $url = 'https://jsonplaceholder.typicode.com/users'; 
   $arguments = array(
        'method' => 'GET'
   );
   $response = wp_remote_get($url, $arguments);
   if (is_wp_error ($response)){
       $error_message = $response -> get_error_message();
       echo "Something Wrong: $error_message";
   }
   $body = wp_remote_retrieve_body ($response);
   $data = json_decode($body);
   session_start();
   $_SESSION['users'] = $body;
   print_r($_SESSION['users']);
}


//for custom end point
add_action('rest_api_init', function() {
	register_rest_route('myplugin/v1', 'users', [
		'methods' => 'GET',
		'callback' => 'wl_users',
	]);
});

//session start
add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');
function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}
function myEndSession() {
    session_destroy ();
}

//add to the dashboard
function test_plugin_setup_menu(){
    add_menu_page( 'Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'show_users' );
}

//dashboard page
function show_users(){
  include ('user-table.php');
}
?>
  