<?php

use Rahim\Keywords;
use Rahim\Vk;

if (isset($_POST['user_id'],$_POST['post']))
{
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../../../../wp-load.php';

    $user_id        = $_POST['user_id'];
    $post           = $_POST['post'];
    $url            = $_POST['url'];

    global $wpdb;
    $account = $wpdb->get_results( "SELECT * FROM  wp_accounts WHERE user_id = ".$user_id,ARRAY_A);


    $access_token   = $account[0]['access_token'];

    $data = new Keywords();
    $DataWithID =  $data->DataWithID($post);
    $DataWithTITLE =  $data->DataWithTITLE($DataWithID);

    $output = $DataWithTITLE;
    $status = $output."\n Post link: ".$url;

    $postShare      = new Vk();
    $postShare->postShare($user_id,$access_token,$status);
}
else
{
    header('location: ../../');
}