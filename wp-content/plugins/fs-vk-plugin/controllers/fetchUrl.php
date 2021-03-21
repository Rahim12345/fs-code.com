<?php
use Rahim\Vk;

if(isset($_POST['apiID'],$_POST['url']))
{
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../../../../wp-load.php';

    $apiID  = $_POST['apiID'];
    $url    = $_POST['url'];

    $access_token_fetch = explode('access_token=',$url);
    $access_token_fetch = explode('&expires_in=0&user_id=',$access_token_fetch[1]);
    $access_token       = $access_token_fetch[0];

    $user_id            = explode('&email',$access_token_fetch[1]);
    $user_id            = $user_id[0];

    $details    = new Vk();
    $details    = $details->usersGet($user_id,$access_token);

    $details    = explode('first_name":"',$details);

    $details    = explode('","id":',$details[1]);
    $name       = $details[0];

    global $wpdb;
    $ckeckUser  = $wpdb->get_results( $wpdb->prepare("SELECT * FROM wp_accounts"),ARRAY_A );

    if(count($ckeckUser) === 0)
    {
        $wpdb->insert('wp_accounts',[
            'user_name'=>$name,
            'user_id'=>$user_id,
            'access_token'=>$access_token
        ]);
        echo 'notFound';
    }
    else
    {
        $access_token = explode("access_token=",$url);

        $access_token = explode("&expires_in",$access_token[1]);

        $access_token = $access_token[0];

        $db->Update("UPDATE wp_accounts SET access_token=? WHERE user_id=?",[$access_token,$user_id]);

        $wpdb->update('wp_accounts',[
            'user_name'=>$name,
            'access_token'=>$access_token
        ],[
            'user_id'=>$user_id
        ]);

        echo 'found';
    }
}
else
{
    header('location: ../../');
}