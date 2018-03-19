<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\Exchange;
use ccxt\hitbtc;

class HitbtcClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new hitbtc($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'HitBTC';
    }
}
