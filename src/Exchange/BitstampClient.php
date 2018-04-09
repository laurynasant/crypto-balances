<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\bitstamp;
use ccxt\Exchange;

class BitstampClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new bitstamp($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Bitstamp';
    }
}
