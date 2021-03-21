<?php

require_once __DIR__.'/../../../../../wp-load.php';
global $wpdb;
$posts = $wpdb->get_results( "SELECT * FROM  $wpdb->posts WHERE post_status = 'publish' AND post_title != '' AND comment_status = 'open'",ARRAY_A);

$output = '';
foreach ($posts as $post)
{
    $output .= '
    <option value="'.get_permalink($post['ID']).'">'.$post['post_title'].'</option>
    ';
}

echo $output;
?>