<?php

$code = $_GET['code'];

WooCommerceGetScorecardApi::updateOption(WooCommerceGetScorecardApi::OPTION_OAUTH_CODE,$code);

$client_id = WooCommerceGetScorecardApi::getOption(WooCommerceGetScorecardApi::OPTION_CLIENT_ID);
$client_secret = WooCommerceGetScorecardApi::getOption(WooCommerceGetScorecardApi::OPTION_CLIENT_SECRET);
$redirect_uri = WooCommerceGetScorecardApi::getOption(WooCommerceGetScorecardApi::OPTION_REDIRECT_URI);

$clientData = array(
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'code' => $code,
    'grant_type' => 'authorization_code',
    'redirect_uri' => $redirect_uri
);

$contents = WooCommerceGetScorecardApi::sendOauthRequest($clientData);
$contents = json_decode($contents);

WooCommerceGetScorecardApi::updateOption(WooCommerceGetScorecardApi::OPTION_ACCESS_TOKEN,$contents->access_token);
WooCommerceGetScorecardApi::updateOption(WooCommerceGetScorecardApi::OPTION_REFRESH_TOKEN,$contents->refresh_token);

WooCommerceGetScorecardApi::deleteOption(WooCommerceGetScorecardApi::OPTION_OAUTH_CODE);

$redirectTo = WOO_GS_ADMIN_AJAX_URL . 'admin.php?page=woocommerce-gs-crm' . '&action=authSuccess';

header('Location: ' . $redirectTo);
die();