<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../../../../wp-load.php';

global $wpdb;
$accounts = $wpdb->get_results( $wpdb->prepare("SELECT * FROM wp_accounts"),ARRAY_A );

$output = '';
foreach ($accounts as $account)
{
    $output .= '<option value="'.$account['user_id'].'">'.$account['user_name'].'</option>';
}

echo $output;