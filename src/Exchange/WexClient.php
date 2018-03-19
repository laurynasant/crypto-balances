<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\wex;
use ccxt\Exchange;

class WexClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new wex($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'WEX';
    }
}
