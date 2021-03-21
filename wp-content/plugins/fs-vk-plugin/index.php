<?php
/**
 * Plugin Name:FS Vk Poster
 *
 * Description:This plugin will get access and then can be share posts in Vk. This is a just practice.
 *
 * Version: 1.0.0
 *
 * Author:Rahim Suleymanov
 */


require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/includes/wp.php';

use Rahim\DB;
use Rahim\Vk;



$db = new DB();
$vk = new Vk();
