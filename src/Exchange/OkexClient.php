<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\okex;
use ccxt\Exchange;

class OkexClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new okex($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'OKEx';
    }
}
