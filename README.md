![orca-logo](https://i.imgur.com/zfKmcuH.png)


Crypto and Fiat Currency Balances
=================================

[![Build Status](https://travis-ci.org/orcaalliance/crypto-balances.svg?branch=master)](https://travis-ci.org/orcaalliance/crypto-balances)
[![Coverage Status](https://coveralls.io/repos/github/orcaalliance/crypto-balances/badge.svg?branch=master)](https://coveralls.io/github/orcaalliance/crypto-balances?branch=master)

This project aims to integrate the various sources and accounts where crypto currency and fiat currency is held. It provides balance information in a single place


Features
--------

* Crypto Currency Exchanges integration
* Open Banking platforms integration
* Standardised currency return from various sources
* Unit-Testing with PHPUnit

Requirements
------------

* PHP 7.1 or later
* [`curl`](https://secure.php.net/manual/en/book.curl.php)
* [`json`](https://secure.php.net/manual/en/book.json.php)
* [`mbstring`](https://secure.php.net/manual/en/book.mbstring.php) (Multibyte String)

Installation
------------

You can install the library via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require orcaalliance/crypto-balances
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

Providers support
----------------
Currently the module supports the following TOP Exchanges according to [CoinMarketCap](https://coinmarketcap.com/)

| Exchange Name | API documentation |
|---------------|-------------------|
| Binance       | [API](https://github.com/binance-exchange/binance-official-api-docs/blob/master/rest-api.md) |
| Bithumb       | [API](https://www.bithumb.com/u1/US127) |
| Bit-Z       | [API](https://www.bit-z.com/api.html) |
| Coinegg       | [API](https://www.coinegg.com/explain.api.html) |
| EXMO       | [API](https://exmo.me/en/api_doc) |
| HitBtc       | [API](https://api.hitbtc.com/) |
| Huobi Pro    | [API](https://github.com/huobiapi/API_Docs/wiki/REST_api_reference) |
| Kraken       | [API](https://www.kraken.com/en-us/help/api) |
| Liqui       | [API](https://liqui.io/api) |
| OKEx       | [API](https://www.okex.com/rest_getStarted.html) |
| Poloniex       | [API](https://poloniex.com/support/api/) |
| WEX       | [API](https://wex.nz/api/3/docs) |


Currency support is also available according to the top 40 currencies as identified by CoinMarketCap. You can find more info in [CoinMarketCap](https://coinmarketcap.com/)

Also, the module supports the following Bank via their Open Banking integration:

| Open Bank     | API documentation | Status |
|---------------|-------------------|--------|
| Nordea        | [API](https://developer.nordeaopenbanking.com) | Implemented |
| SEB           | [API](https://developer.baltics.sebgroup.com/) | Upcoming    |
| Swedbank      | [API](https://developer.swedbank.com/)         | Upcoming    |
| Deutche Bank  | [API](https://api-open.db.com/)                | Upcoming    |


Getting Started
---------------

Simple usage looks like:

```php
use Orca\CryptoBalances\Exchange\BinanceClient;
$client = new \Orca\CryptoBalances\Exchange\BinanceClient("key", "secret");
var_dump($client->getBalanceList());
```

Development
-----------
Install dependencies:

``` bash
composer install
```

Install dependencies as mentioned above (which will resolve [PHPUnit](http://packagist.org/packages/phpunit/phpunit)), then you can run the test suite:

```bash
./vendor/bin/phpunit
```

Methods Provided
----------------
addProvider() - add the configured provider to the BalanceClient:

```php
$binance = new \Orca\CryptoBalances\Exchange\BinanceClient("api-key", "api-secrect");
$client = new BalanceClient();
$client->addProvider($binance);
```

getProviders() - returns the configured Exchange and Open Bank APIs:

```php
$binance = new \Orca\CryptoBalances\Exchange\BinanceClient("api-key", "api-secrect");
$client = new BalanceClient();
$client->addProvider($binance);
var_dump($client->getProviders());
```

getBalanceList() - returns the Crypto and Fiat currency balances from the configured providers:

```php
$binance = new \Orca\CryptoBalances\Exchange\BinanceClient("api-key", "api-secrect");
$client = new BalanceClient();
$client->addProvider($binance);
var_dump($client->getBalanceList());
```

getExchangeRates() - returns the USD exchange rates from CoinMarketCap:

```php
$client = new \Orca\CryptoBalances\Service\ExchangeRateClient();
var_dump($client->getExchangeRates());
```
