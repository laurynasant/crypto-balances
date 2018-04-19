<?php declare(strict_types=1);

namespace Orca\CryptoBalances\OpenBanking;

/**
 * Class DeutscheBankClient
 * @package Orca\CryptoBalances\OpenBanking
 */
class DeutscheBankClient extends AbstractClient {

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'DeutscheBank';
    }

    /**
     * @return string
     */
    public function getAuthUrl() : string
    {
        return 'https://simulator-api.db.com/gw/oidc/authorize'
            .'?response_type=code'
            .'&client_id='.$this->key
            .'&redirect_uri='.$this->redirectUri
            .'&nonce=randomNonce'
            .'&state=randomState';
    }

    /**
     * @return array
     */
    public function getTokenRequestHeader() : array
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization'   => 'Basic '
                . base64_encode($this->key.':'.$this->secret)
        ];
    }

    /**
     * @return string
     */
    public function getTokenRequestUri() : string {
        return 'https://simulator-api.db.com/gw/oidc/token';
    }

    /**
     * @return array
     */
    public function getTokenRequestBody() : array
    {
        return [
            'grant_type'    => 'authorization_code',
            'code'          => $this->authCode,
            'client_id'     => $this->key,
            'client_secret' => $this->secret,
            'redirect_uri'  => $this->redirectUri
        ];
    }

    /**
     * @return array
     */
    public function getResourceRequestHeader() : array
    {
        return [
            'Authorization' => 'Bearer '.$this->accessToken['access_token'],
        ];
    }

    /**
     * @return array
     */
    public function getAccounts(): array
    {
        $accounts = [];

        $responseArray = $this->getResource('https://simulator-api.db.com:443/gw/dbapi/v2/cashAccounts');

        foreach ($responseArray['accounts'] as $account) {
            if (array_key_exists('currentBalance', $account)) {
                $accounts[] = [
                    'total' => $account['currentBalance'],
                    'currency' => $account['currencyCode'],
                    'accountNumber' => $account['iban']
                ];
            }
        }

        return $accounts;
    }

}
