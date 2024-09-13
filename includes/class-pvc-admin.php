<?php
class PVC_Admin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
    }

    public function add_admin_menu() {
        add_menu_page(
            'Page Visit Counter',
            'Page Visit Counter',
            'manage_options',
            'pvc_dashboard',
            array($this, 'display_dashboard')
        );
    }

    public function display_dashboard() {
        include plugin_dir_path(__FILE__) . '../templates/pvc-dashboard.php';
    }
}
