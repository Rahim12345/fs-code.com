<?php

echo 'App id <input type="hidden" id="app_id" value="'.get_option('app_id').'"><span class="form-control">'.get_option('app_id').'</span><br>Secret token<span id="secret_token" class="form-control">'.get_option('secret_token').'</span>';
