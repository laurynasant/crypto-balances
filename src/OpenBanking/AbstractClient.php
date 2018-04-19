<?php declare(strict_types=1);

namespace Orca\CryptoBalances\OpenBanking;

use Orca\CryptoBalances\Service\ClientInterface;
use Orca\CryptoBalances\Enum\FiatCurrency;

use GuzzleHttp\Client;

/**
 * Class AbstractClient
 * @package Orca\CryptoBalances\OpenBanking
 */
abstract class AbstractClient implements ClientInterface
{
    /** @var string */
    protected $key;

    /** @var string */
    protected $secret;

    /** @var string */
    public $authCode;

    /** @var string */
    public $authCodeKey = 'code';

    /** @var string */
    protected $redirectUri;

    /** @var array */
    protected $accessToken;

    /** @var array */
    private $balanceList;

    /**
     * @param string $key
     * @param string $secret
     * @param string $redirectUri
     */
    public function __construct(string $key, string $secret, string $redirectUri)
    {
        $this->key = $key;
        $this->secret = $secret;
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
                    $results[$currency->getName()][] = [
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
     * @param $uri
     */
    public function getResource(string $uri)
    {
        if (!$this->accessToken) {
            $this->accessToken = $this->getToken();
        }

        $response = (new Client())->request(
            'GET',
            $uri,
            [
                'headers' => $this->getResourceRequestHeader()
            ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return array
     */
    protected function getConfig(): array
    {
        return [
            'apiKey' => $this->key,
            'secret' => $this->secret,
            'redirectUri' => $this->redirectUri,
        ];
    }

    /**
     * @return array
     */
    protected function getToken(): array
    {
        $response = (new Client())->request(
            'POST',
            $this->getTokenRequestUri(),
            [
                'headers' => $this->getTokenRequestHeader(),
                'form_params' => $this->getTokenRequestBody()
            ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return array
     */
    abstract protected function getAccounts(): array;

    /**
     * @return string
     */
    public abstract function getAuthUrl(): string;

    /**
     * @return string
     */
    public abstract function getTokenRequestUri(): string;

    /**
     * @return array
     */
    public abstract function getTokenRequestHeader(): array;

    /**
     * @return array
     */
    public abstract function getTokenRequestBody(): array;

    /**
     * @return array
     */
    public abstract function getResourceRequestHeader(): array;

}
