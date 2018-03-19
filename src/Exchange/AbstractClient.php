<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Exchange;

use ccxt\Exchange;
use Orca\CryptoBalances\Enum\CryptoCurrency;
use Orca\CryptoBalances\Service\ClientInterface;

abstract class AbstractClient implements ClientInterface
{
    /** @var string */
    private $key;

    /** @var string */
    private $secret;

    /** @var array */
    private $balanceList;

    /**
     * @param string $key
     * @param string $secret
     */
    public function __construct(string $key, string $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * @return Exchange
     */
    abstract protected function getClient(): Exchange;

    /**
     * @inheritDoc
     */
    public function getBalance(CryptoCurrency $currency): float
    {
        $balances = $this->fetchBalanceList();
        $balance = $balances[$currency->getName()]['total'] ?? 0;

        return (float)$balance;
    }

    /**
     * @inheritdoc
     */
    public function getBalanceList(): array
    {
        $results = [];

        foreach (CryptoCurrency::getEnumerators() as $currency) {
            $results[$currency->getName()] = $this->getBalance($currency);
        }

        foreach ($this->fetchBalanceList() as $currency => $value) {
            $amount = (int)($value['total'] ?? 0);
            if ($amount > 0) {
                $results[$currency] = $amount;
            }
        }

        return $results;
    }

    /**
     * @return array
     */
    private function fetchBalanceList(): array
    {
        if ($this->balanceList === null) {
            $this->balanceList = $this->getClient()->fetch_balance();
        }

        return $this->balanceList;
    }

    /**
     * @return array
     */
    protected function getConfig(): array
    {
        return [
            'apiKey' => $this->key,
            'secret' => $this->secret,
        ];
    }
}
