<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\bittrex;
use ccxt\Exchange;

class BittrexClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new bittrex($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Bittrex';
    }
}
