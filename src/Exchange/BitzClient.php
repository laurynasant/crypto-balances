<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\bitz;
use ccxt\Exchange;

class BitzClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new bitz($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Bit-Z';
    }
}
