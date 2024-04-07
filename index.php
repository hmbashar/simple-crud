<?php 
/*
Plugin Name: Simple CRUD
Plugin URI: https://github.com/hmbashar/simple-crud
Description: This is a simple CRUD plugin
Version: 1.0.0
Author: Md Abul Bashar
Author URI: https://www.hmbashar.com/
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: simcrud
Domain Path: /languages
*/

define('SIMCRUD_PATH', plugin_dir_path(__FILE__));
define('SIMCRUD_URL', plugin_dir_url(__FILE__));


function simcrud_admin_menu() {

    add_menu_page(esc_html__('Simple CRUD', 'simcrud'), esc_html__('Simple CRUD', 'simcrud'), 'manage_options', 'simple-crud', 'simcrud__crud_output', 'dashicons-admin-users');

    add_submenu_page( 'simple-crud',esc_html__('Student List', 'simcrud'), esc_html__('Student List', 'simcrud'), 'manage_options', 'simple-crud', 'simcrud__std_list_output' );

    add_submenu_page( 'simple-crud',esc_html__('Student Add', 'simcrud'), esc_html__('Student Add', 'simcrud'), 'manage_options', 'simple-student-added', 'simcrud__std_add_output' );
}

add_action( 'admin_menu', 'simcrud_admin_menu' );


function simcrud__crud_output() {
    echo '<h1>Simple CRUD</h1>';
}


function simcrud__std_list_output() {
    include_once SIMCRUD_PATH . 'views/std-list.php';
}

function simcrud__std_add_output() {
    include_once SIMCRUD_PATH . 'views/std-add.php';
}