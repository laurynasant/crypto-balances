<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\kraken;
use ccxt\Exchange;

class KrakenClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new kraken($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Kraken';
    }
}
