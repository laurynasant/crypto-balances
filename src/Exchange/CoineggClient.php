<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\coinegg;
use ccxt\Exchange;
use Orca\CryptoBalances\Enum\CryptoCurrency;
use ccxt\ExchangeError;

class CoineggClient extends AbstractClient
{
    /**
     * @inheritDoc
     */
    public function getClient(): Exchange
    {
        return new coinegg($this->getConfig());
    }

    /**
     * @inheritDoc
     */
    public function getBalance(CryptoCurrency $currency): float
    {
        try {
            return parent::getBalance($currency);
        } catch (ExchangeError $error) {
            if ($error->getMessage() === 'coineggLack of balance') {
                return 0;
            }

            throw $error;
        }
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'CoinEgg';
    }
}
