<div class="wrap">
    <h1>Page Visit Counter Dashboard</h1>
    <?php
    global $wpdb;
    $table_name = $wpdb->prefix . 'page_visit_counter';

    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY visit_count DESC");

    if ($results) {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '<thead><tr><th>Page ID</th><th>Visites</th></tr></thead>';
        echo '<tbody>';
        foreach ($results as $row) {
            echo '<tr><td>' . esc_html($row->post_id) . '</td><td>' . esc_html($row->visit_count) . '</td></tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Aucune visite trouvée.</p>';
    }
    ?>
</div>
