<?php
class PVC_Dashboard {
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles_and_scripts'));
    }

    public function enqueue_styles_and_scripts() {
        wp_enqueue_style('pvc-style', plugins_url('assets/css/style.css', __FILE__));
        wp_enqueue_script('pvc-script', plugins_url('assets/js/script.js', __FILE__), array('jquery'), null, true);
    }
}
