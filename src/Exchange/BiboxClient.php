<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\bibox;
use ccxt\Exchange;

class BiboxClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    public function getClient(): Exchange
    {
        return new bibox($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Bibox';
    }
}
