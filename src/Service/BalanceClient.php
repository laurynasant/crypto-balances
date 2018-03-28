<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Service;

class BalanceClient
{
    /** @var ClientInterface[] */
    private $providers = [];

    /**
     * @return array
     */
    public function getBalanceList(): array
    {
        $balances = [];

        foreach ($this->providers as $provider) {
            $providerName = $provider->getName();

            try {
                foreach ($provider->getBalanceList() as $currency => $balance) {
                    $balances[$providerName][$currency] = $balance;
                }
            } catch (\Throwable $t) {
                echo $t->getMessage();
            }
        }

        return $balances;
    }

    /**
     * @param ClientInterface $provider
     */
    public function addProvider(ClientInterface $provider): void
    {
        $this->providers[$provider->getName()] = $provider;
    }

    /**
     * @return ClientInterface[]
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

}
