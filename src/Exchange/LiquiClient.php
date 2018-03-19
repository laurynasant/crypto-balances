<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\liqui;
use ccxt\Exchange;

class LiquiClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new liqui($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Liqui';
    }
}
