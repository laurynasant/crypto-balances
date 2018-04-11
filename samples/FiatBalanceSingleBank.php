<?php

require __DIR__ . '/../vendor/autoload.php';

// add the required OpenBanking Client
use Orca\CryptoBalances\OpenBanking\DeutscheBankClient;

// set the credentials
$app_id = "app-id";
$app_secret = "app-secret";

// URI must be registered in Bank App's settings
$redirectUri = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'])[0];

// add the API key and secret for the account
$client = new DeutscheBankClient($app_id, $app_secret, $redirectUri);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists($client->authCodeKey, $_GET)) {
    $client->authCode = $_GET[$client->authCodeKey];

    var_dump($client->getBalanceList());
}
else {
    // initiate the OAuth flow
    echo '<a href="'.$client->getAuthUrl().'">GET THE BALANCES</a>';
}

