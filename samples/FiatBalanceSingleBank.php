<?php

require __DIR__ . '/../vendor/autoload.php';

// add the required OpenBanking Client
use Orca\CryptoBalances\OpenBanking\NordeaClient;

// set the credentials
$app_id = "app-id";
$redirectUri = "https://httpbin.org/anything";
$app_secret = "app-secret";

// initiate the OAuth flow
echo '<a target="_blank" href="https://oauth.developer.nordeaopenbanking.com/oauth/index.html?client_id='.$app_id.'&redirect_uri='.$redirectUri.'">GET THE TOKEN</a>';

// add the API key and secret for the account
// $client = new NordeaClient($app_secret, $app_secret);
echo '<form method="POST"><input type="text" name="code"></input><input type="submit">Get Balance</input></form>';
echo '<div>Select Offline mode and fill in any user name and 111111 password for Nordea Bank Sandbox</div>'
echo '<div>Copy the code field from the returned request in httpbin and fill in to the input field after the login has succeeded</div>'

if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('code', $_POST)) {
    $app_auth_code = $_POST["code"];

    $client = new NordeaClient($app_id, $app_secret, $app_auth_code, $redirectUri);

    var_dump($client->getBalanceList());
}
