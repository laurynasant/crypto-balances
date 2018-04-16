<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\zaif;
use ccxt\Exchange;

class ZaifClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new zaif($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Zaif';
    }
}
