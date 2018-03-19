<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\Exchange;
use ccxt\huobipro;

class HuobiProClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new huobipro($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Huobi Pro';
    }
}
