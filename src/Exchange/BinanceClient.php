<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\binance;
use ccxt\Exchange;

class BinanceClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new binance($this->getConfig());
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'Binance';
    }
}
