<?php

$client_data = array(
    'client_id'     => $_GET['client_id'],
    'client_secret' => $_GET['client_secret'],
    'redirect_uri'  => $_GET['redirect_uri'],
    'user_id'       => $_GET['user_id']
);

WooCommerceGetScorecardApi::updateOption(WooCommerceGetScorecardApi::OPTION_CLIENT_ID,$client_data['client_id']);
WooCommerceGetScorecardApi::updateOption(WooCommerceGetScorecardApi::OPTION_CLIENT_SECRET,$client_data['client_secret']);
WooCommerceGetScorecardApi::updateOption(WooCommerceGetScorecardApi::OPTION_USER_ID,$client_data['user_id']);
WooCommerceGetScorecardApi::updateOption(WooCommerceGetScorecardApi::OPTION_REDIRECT_URI,$client_data['redirect_uri']);

$client_id = WooCommerceGetScorecardApi::getOption(WooCommerceGetScorecardApi::OPTION_CLIENT_ID);
$redirect_uri = WooCommerceGetScorecardApi::getOption(WooCommerceGetScorecardApi::OPTION_REDIRECT_URI);

$request_type = 'woocommerce';

if($client_id && $redirect_uri){
    $sendTo = WooCommerceGetScorecardApi::getApiUrl().'/oauth/authorize?response_type=code&client_id='.$client_id.'&redirect_uri='.urlencode($redirect_uri).'&state=xyz&request_type='.$request_type;
    header('Location:'.$sendTo);
    die();
}
else{
    throw new Exception("error, clientId/redirectUri is not set");
}