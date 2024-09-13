<?php
class PVC_Counter {
    public function __construct() {
        add_action('wp_head', array($this, 'track_visit'));
    }

    public function track_visit() {
        if (is_singular()) {
            global $post;
            $post_id = $post->ID;
            $this->increment_visit_count($post_id);
        }
    }

    private function increment_visit_count($post_id) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'page_visit_counter';
        
        $wpdb->query(
            $wpdb->prepare(
                "INSERT INTO $table_name (post_id, visit_count) VALUES (%d, %d) ON DUPLICATE KEY UPDATE visit_count = visit_count + 1",
                $post_id, 1
            )
        );
    }

    public static function create_table() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'page_visit_counter';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            post_id BIGINT(20) NOT NULL,
            visit_count BIGINT(20) DEFAULT 0 NOT NULL,
            PRIMARY KEY (post_id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    public static function delete_table() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'page_visit_counter';
        $wpdb->query("DROP TABLE IF EXISTS $table_name");
    }
}
