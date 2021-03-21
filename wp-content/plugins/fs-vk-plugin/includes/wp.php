<?php

add_action('admin_menu', 'vk_poster');

function vk_poster()
{
    add_menu_page('Vk Poster', 'Vk Poster', 'manage_options', 'vk-poster', 'vk_poster_content', 'dashicons-format-status', 5);

    add_submenu_page('vk-poster', 'Settings', 'Settings', 'manage_options', 'vk-poster-settings', 'vk_poster_settings_content');

    add_submenu_page('vk-poster', 'Accounts', 'Accounts', 'manage_options', 'vk-poster-accounts', 'vk_poster_accounts_content');
}

function vk_poster_content()
{
    echo '
    <div class="container">
        <h2>Vk Poster </h2>
        <hr>
        <div class="wrap">
        <h3>Welcome to the Vk Poster</h3>
        </div>
    </div>
    ';
}

function vk_poster_settings_content()
{
    $alert          = null;
    $app_id         = null;
    $secret_token   = null;

    $app_id         = get_option('app_id');
    $secret_token   = get_option('secret_token');

    if (isset($_POST['submit']))
    {
        $app_id         = trim(htmlspecialchars($_POST['app_id']));
        $secret_token   = trim(htmlspecialchars($_POST['secret_token']));

        if (empty($app_id) || empty($secret_token))
        {
            $alert = '
            <div style="background-color: #f39c12;padding: 10px;margin-bottom:10px;color: white;font-size: 14px;border-radius: 5px;">Both of fields are required </div>
            ';
        }
        else
        {
            if (get_option('app_id') === false)
            {
                $action = 'added';
                add_option('app_id',$app_id);
                add_option('secret_token',$secret_token);
            }
            else
            {
                $action = 'updated';
                update_option('app_id',$app_id,'yes');
                update_option('secret_token',$secret_token,'yes');
            }

            $alert = '
            <div style="background-color: #2ecc71;padding: 10px;margin-bottom:10px;color: white;font-size: 14px;border-radius: 5px;">App '.$action.'  successfully</div>
            ';
        }
    }

    echo '
    <div class="container">
        <h2>Vk Settings </h2>
        <hr>
        <div class="wrap">
        <h3>Welcome to the Vk Poster Settings</h3>
        '.$alert.'
            <form action="'.esc_attr( admin_url('admin.php?page=vk-poster-settings') ).'" method="POST">
                <input type="text" name="app_id" placeholder="Enter an app id" value="'.$app_id.'"/> <br><br>
                <input type="text" name="secret_token" placeholder="Enter a secret token" value="'.$secret_token.'"/> <br><br>
            
                <input type="submit" name="submit" value="Save" />
            </form>
        </div>
    </div>
    ';
}

function vk_poster_accounts_content()
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>vk - api</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?php echo esc_attr( plugin_dir_url('fs-vk-plugin/assets/css/main.css').'main.css' ) ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Accounts</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a id="accountModalOpen" href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>ADD AN ACCOUNT</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                    </th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                <?php require_once __DIR__.'/views/accounts.php'; ?>

                </tbody>
            </table>

        </div>
    </div>

    <!--  Account Modal  -->
    <?php require_once __DIR__.'/modals/addAccountModal.php'; ?>
    <?php require_once __DIR__.'/modals/shareModal.php'; ?>

    <script src="<?php echo esc_attr( plugin_dir_url('fs-vk-plugin/assets/js/main.js').'main.js' ) ?>"></script>
    </body>
    </html>
<?php
}