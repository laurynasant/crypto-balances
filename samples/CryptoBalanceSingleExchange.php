<?php

require __DIR__ . '/../vendor/autoload.php';

// add the required CryptoCurrency Exchange Client
use Orca\CryptoBalances\Exchange\BinanceClient;

// add the API keys for the account
$client = new BinanceClient("api-key", "api-secret");

// get the configured currency balances
var_dump($client->getBalanceList());
