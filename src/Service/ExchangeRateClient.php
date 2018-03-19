<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Service;

use Orca\CryptoBalances\Enum\Currency;
use GuzzleHttp\Client;

class ExchangeRateClient
{

    /** @var array */
    private $rates;

    /**
     * @param Currency $currency
     * @param float $amount
     *
     * @return float
     */
    public function calculateRate(Currency $currency, float $amount): float
    {
        $rate = $this->getExchangeRates()[$currency->getName()] ?? 0;

        return (float)($rate * $amount);
    }

    /**
     * @return array
     */
    public function getExchangeRates(): array
    {
        if ($this->rates !== null) {
            return $this->rates;
        }

        foreach ($this->fetchRates() as $rate) {
            $this->rates[$rate['symbol']] = (float)($rate['price_usd'] ?? 0);
        }

        return $this->rates;
    }

    /**
     * @return array
     */
    private function fetchRates(): array
    {
        $response = (new Client())->get('https://api.coinmarketcap.com/v1/ticker/');

        return json_decode($response->getBody()->getContents(), true);
    }

}
