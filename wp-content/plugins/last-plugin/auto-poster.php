<?php
/**
 * Plugin Name:FS CODE AutoPoster
 * Description: Just an example for the admin menu in practice
 */

function auto_poster()
{
    add_menu_page( 'Auto Poster','Auto Poster','manage_options','auto-poster','auto_poster_content','dashicons-format-status',5 );

    add_submenu_page('auto-poster','Auto Poster Settings','Settings','manage_options','auto-poster-settings','auto_poster_settings_content',1);
}

function auto_poster_content()
{
    echo '<div class="wrap"><h2>Auto Poster</h2> Welcome to the Auto Poster</div>';
}

function auto_poster_settings_content()
{
    $alert      = null;
    $option     = null;
    if (isset($_POST['submit']))
    {
        $option = trim(htmlspecialchars($_POST['option']));
        if (!empty($option))
        {
            $my_option = get_option('my_option');

            if ($my_option === false)
            {
                $action = 'added';
                add_option('my_option',$option);
            }
            else
            {
                $action = 'updated';
                update_option('my_option',$option,'yes');
            }

            $alert = '
            <div style="background-color: #2ecc71;padding: 10px;margin-bottom:10px;color: white;font-size: 14px;border-radius: 5px;">'.$option.' '.$action.'  successfully</div>
            ';
        }
        else
        {
            $alert = '
            <div style="background-color: #f39c12;padding: 10px;margin-bottom:10px;color: white;font-size: 14px;border-radius: 5px;">The option is required </div>
            ';
        }
    }

    echo '
    <div class="container">
        <h2>Auto Poster Settings </h2>
        <hr>
        <div class="wrap">
        <h3>Welcome to the Auto Poster Settings</h3>
        '.$alert.'
            <form id="myForm" name="myform" action="'.esc_attr( admin_url('admin.php?page=auto-poster-settings') ).'" method="POST">
                <input type="text" name="option" placeholder="Enter an option" value="'.$option.'"/>
            
                <input type="submit" name="submit" value="Save" />
            </form>
        </div>
    </div>
    ';
}


add_action('admin_menu','auto_poster');