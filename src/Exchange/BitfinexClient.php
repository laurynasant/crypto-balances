<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\bitfinex2;
use ccxt\Exchange;

class BitfinexClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new bitfinex2($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Bitfinex';
    }
}
