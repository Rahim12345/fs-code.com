<?php

use Rahim\Vk;

if (isset($_POST['client_id']))
{
    require_once __DIR__.'/../vendor/autoload.php';

    $client_id = $_POST['client_id'];

    $get_access = new Vk();
    $url        = $get_access->getAccess($client_id);

    echo $url;
}
else
{
    header('location: ../../');
}