<?php declare(strict_types=1);

namespace Orca\CryptoBalances\OpenBanking;

/**
 * Class NordeaClient
 * @package Orca\CryptoBalances\OpenBanking
 */
class NordeaClient extends AbstractClient
{

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'Nordea';
    }

    /**
     * @return string
     */
    public function getAuthUrl() : string
    {
        return 'https://api.nordeaopenbanking.com/v1/authentication'
            .'?client_id='.$this->key
            .'&redirect_uri='.$this->redirectUri
            .'&state=';
    }

    /**
     * @return string
     */
    public function getTokenRequestUri() : string {
        return 'https://api.nordeaopenbanking.com/v1/authentication/access_token';
    }

    /**
     * @return array
     */
    public function getTokenRequestHeader() : array
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'X-IBM-Client-Id'   => $this->key,
            'X-IBM-Client-Secret'   => $this->secret
        ];
    }

    /**
     * @return array
     */
    public function getTokenRequestBody() : array
    {
        return [
            'code'  => $this->authCode,
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
            'X-IBM-Client-Id'   => $this->key,
            'X-IBM-Client-Secret'   => $this->secret
        ];
    }

    /**
     * @return array
     */
    public function getAccounts(): array
    {
        $accounts = [];

        $responseArray = $this->getResource('https://api.nordeaopenbanking.com/v2/accounts');

        foreach ($responseArray['response']['accounts'] as $account) {
          if (array_key_exists('availableBalance', $account)) {
            $accounts[] = [
              'total' => $account['availableBalance'],
              'currency' => $account['currency'],
              'accountNumber' => $account['accountNumber']['value']];
          }
        }

        return $accounts;
    }

    /**
     * @param array $transfer
     * @return array
     */
    public function makeTransfer(array $transfer): array
    {
        return $this->postResource('https://api.nordeaopenbanking.com/v2/payments/sepa', $transfer);
    }

    /**
     * @return array
     */
    public function getExtendedRequestHeader(): array
    {
        // sandbox only
        return $this->getResourceRequestHeader() + [
            'X-Response-Scenarios' => 'AuthorizationSkipAccessControl',
            'Accept' => 'application/json, text/plain, */*',
            'Content-Type' => 'application/json'
        ];
    }



}
