<?php
/**
 * Created by PhpStorm.
 * User: Antonshell
 * Date: 17.09.2015
 * Time: 14:53
 */

if($_GET['action'] === 'logout'){
    WooCommerceGetScorecardApi::deleteAuthData();
}

$apiClient = new WooCommerceGetScorecardApiClient();

if($_GET['action'] === 'importData'){
    //$apiClient->importData();
    require_once(dirname(__FILE__) . '/../includes/action_import_data.php');
}

if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){
    if($apiClient->authorized){
        require_once(dirname(__FILE__) . '/../includes/auth_user_info.php');
    }
    else{
        require_once(dirname(__FILE__) . '/../includes/auth_start.php');
    }
}
else{
    require_once(dirname(__FILE__) . '/../includes/woocommerce_inactive.php');
}

