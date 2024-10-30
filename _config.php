<?php
/**
 * Created by PhpStorm.
 * User: Antonshell
 * Date: 04.03.2015
 * Time: 12:24
 */

switch($_SERVER['SERVER_ADDR']) {
    case '127.0.0.19':
        $environment = 'local';
        break;
    case '46.101.26.74':
        $environment = 'dev';
        break;
    default:
        $environment = 'production';
        break;
}

$app_config = array();

$app_config['production'] = [
    'getscorecardBaseUrl' => 'https://app.getscorecard.com'
];

$app_config['dev'] = array(
    'getscorecardBaseUrl' => 'http://46.101.26.74:8001'
);

$app_config['local'] = array(
    'getscorecardBaseUrl' => 'http://127.0.0.1:8001'
);

$config = $app_config[$environment];

define('WOO_GS_GETSCORECARD7_GS_BASE_URL', $config['getscorecardBaseUrl'] );


define('WOO_GS_CLOUD_PATH', realpath(dirname(__FILE__) ) );
define('WOO_GS_ADMIN_AJAX_URL',  get_admin_url());

$baseUrl = site_url();
define('WOOGS_URL_PATH', $baseUrl );
define('WOOGS_URL_PATH_ADMIN', WOOGS_URL_PATH . '/wp-admin/admin.php?page=woocommerce-gs-crm');

define('WOO_GS_FACEBOOK_URL', 'https://www.facebook.com/getscorecard');
define('WOO_GS_GOOGLE_PLUS_URL', 'https://plus.google.com/+GetScorecard/videos');
define('WOO_GS_LINKED_IN_URL', 'https://www.linkedin.com/company/getscorecard');
define('WOO_GS_TWITTER_URL', 'https://twitter.com/get_scorecard');
define('WOO_GS_YOUTUBE_URL', 'https://www.youtube.com/user/getscorecard');

define('WOO_GS_GETSCORECARD_BASE_URL', $config['getscorecardBaseUrl'] );

define('WOO_GS_GETSCORECARD_WEBSITE_URL', 'http://www.getscorecard.com/' );
define('WOO_GS_GETSCORECARD_WEBSITE_LABEL', 'GetScorecard.com' );
define('WOO_GS_GETSCORECARD_PROJECT_NAME', 'GetScorecard' );

define('WOO_GS_PLUGIN_NAME', 'GetScorecard CRM for Contact Form 7' );
define('WOO_GS_PLUGIN_VERSION', '1.0.0' );

require_once('classes/WooCommerceGetScorecardApi.php');
require_once('classes/WooCommerceGetScorecardApiClient.php');
require_once('classes/WooCommerceGetScorecardHelper.php');