<?php

require_once __DIR__.'/../../../../../wp-load.php';
global $wpdb;
$accounts = $wpdb->get_results( "SELECT * FROM  wp_accounts",ARRAY_A);

foreach ($accounts as $account)
{
    echo '
    <tr>
        <td>
            <span class="custom-checkbox">
                <input type="checkbox" id="account_'.$account['id'].'" name="accounts[]" value="'.$account['id'].'">
                <label for="account_'.$account['id'].'"></label>
            </span>
        </td>
        <td style="text-align: right">'.$account['user_name'].'</td>
        <td><i class="fa fa-share" data-toggle="modal" data-target="#sharePostModal"></i></td>
    </tr>
    ';
}
?>