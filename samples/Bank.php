<?php

require __DIR__ . '/../vendor/autoload.php';

// add the required OpenBanking Client
use Orca\CryptoBalances\OpenBanking\NordeaClient as Client;

// set the credentials
$app_id = "app-id";
$app_secret = "app-secret";

// URI must be registered in Bank App's settings
$redirectUri = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . explode('?', $_SERVER['REQUEST_URI'])[0];

// add the API key and secret for the account
$client = new Client($app_id, $app_secret, $redirectUri);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists($client->authCodeKey, $_GET)) {
    $client->authCode = $_GET[$client->authCodeKey];

    # GET BALANCE LIST
//    var_dump($client->getBalanceList());

    $transfer = [
        "amount" => "123.45",
        "creditor" => [
            "account" => [
                "_type" => "IBAN",
                "value" => "FI1350001520000081"
            ],
            "message" => "Message for the beneficiary",
            "name" => "Beneficiary name",
            "reference" => [
                "_type" => "RF",
                "value" => "RF18539007547034"
            ]
        ],
        "currency" => "EUR",
        "debtor" => [
            "_accountId" => "FI6593857450293470-EUR"
        ],
        "externalId" => "no example"
    ];

    var_dump($client->makeTransfer($transfer));
}
else {
    // initiate the OAuth flow
    echo '<a href="'.$client->getAuthUrl().'">AUTHENTIFICATE</a>';
}



