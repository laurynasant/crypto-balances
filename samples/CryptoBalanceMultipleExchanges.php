<?php

require __DIR__ . '/../vendor/autoload.php';

// add the required CryptoCurrency Exchange Clients
use Orca\CryptoBalances\Exchange\BinanceClient;

// add the Exchange Client to make the requests
use Orca\CryptoBalances\Service\BalanceClient;

// set up the Clients with API keys
$binance = new BinanceClient("api-key", "api-secret");

// set up the Exchange Client
$client = new BalanceClient();
// add the Binance client to the multi client request
$client->addProvider($binance);

// check details for all exchanges added
var_dump($client->getProviders());

// request balance for all exchanges configured
var_dump($client->getBalanceList());
