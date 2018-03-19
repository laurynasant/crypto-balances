<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\Exchange;
use ccxt\poloniex;

class PoloniexClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new poloniex($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Poloniex';
    }
}
