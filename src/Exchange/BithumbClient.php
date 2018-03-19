<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\bithumb;
use ccxt\Exchange;

class BithumbClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new bithumb($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Bithumb';
    }
}
