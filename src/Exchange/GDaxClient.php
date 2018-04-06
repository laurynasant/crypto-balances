<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\gdax;
use ccxt\Exchange;

class GDaxClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new gdax($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'GDax';
    }
}
