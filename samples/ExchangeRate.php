<?php

require __DIR__ . '/../vendor/autoload.php';

// add the ExchangeRate Client
use Orca\CryptoBalances\Service\ExchangeRateClient;

// initiate the Exchange Rate class
$client = new ExchangeRateClient();

// retrieve exchange rates
var_dump($client->getExchangeRates());
