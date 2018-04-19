<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\lbank;
use ccxt\Exchange;

class LbankClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new lbank($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Lbank';
    }
}
