<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\bitflyer;
use ccxt\Exchange;

class BitflyerClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new bitflyer($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Bitflyer';
    }
}
