<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\exmo;
use ccxt\Exchange;

class ExmoClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new exmo($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'EXMO';
    }
}
