<?php
/*
Plugin Name: Page Visit Counter
Description: Un plugin simple pour compter les visites de chaque page.
Version: 1.0
Author: Achref CHOUIKH
*/

require_once plugin_dir_path(__FILE__) . 'includes/class-pvc-counter.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-pvc-admin.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-pvc-dashboard.php';

// Initialiser le plugin
function pvc_init() {
    new PVC_Counter();
    new PVC_Admin();
    new PVC_Dashboard();
}
add_action('plugins_loaded', 'pvc_init');

function pvc_activate() {
    PVC_Counter::create_table();
}
function pvc_deactivate() {
    PVC_Counter::delete_table();
}
register_activation_hook(__FILE__, 'pvc_activate');
register_deactivation_hook(__FILE__, 'pvc_deactivate');
