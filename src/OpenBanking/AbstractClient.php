<?php declare(strict_types=1);

namespace Orca\CryptoBalances\OpenBanking;

use Orca\CryptoBalances\Service\ClientInterface;
use Orca\CryptoBalances\Enum\FiatCurrency;

abstract class AbstractClient implements ClientInterface
{
    /** @var string */
    protected $key;

    /** @var string */
    protected $secret;

    /** @var string */
    protected $authCode;

    /** @var string */
    protected $redirectUri;

    /** @var string */
    protected $accessToken;

    /** @var array */
    private $balanceList;

    /**
     * @param string $key
     * @param string $secret
     */
    public function __construct(string $key, string $secret, string $authCode, string $redirectUri)
    {
        $this->key = $key;
        $this->secret = $secret;
        $this->authCode = $authCode;
        $this->redirectUri = $redirectUri;
    }

    /**
     * @inheritDoc
     */
    public function getBalance(FiatCurrency $currency): float
    {
      // call the method to retrieve balances here

      $balance = $balances[$currency->getName()]['total'] ?? 0;

      return (float)$balance;
    }

    /**
     * @inheritdoc
     */
    public function getBalanceList(): array
    {
        $results = [];

        foreach (FiatCurrency::getEnumerators() as $currency) {
            foreach ($this->fetchBalanceList() as $account) {
                if ($account['currency'] == $currency->getName()) {
                    $results[$currency->getName()] = [
                      'account' => $account['accountNumber'],
                      'total' => $account['total']
                    ];
                }
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
            $this->balanceList = $this->getAccounts();
        }

        return $this->balanceList;
    }

    /**
     * @return array
     */
    abstract protected function getAccounts(): array;

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
