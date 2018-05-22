<?php declare(strict_types=1);

namespace Orca\CryptoBalances\OpenBanking;

/**
 * Class BBVAClient
 * @package Orca\CryptoBalances\OpenBanking
 */
class BBVAClient extends AbstractClient
{

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'BBVA';
    }

    /**
     * @return string
     */
    public function getAuthUrl(): string
    {
        return 'https://connect.bbva.com/token/authorize'
            . '?client_id=' . $this->key
            . '&response_type=code'
            . '&redirect_uri=' . $this->redirectUri;
    }

    /**
     * @return array
     */
    public function getTokenRequestHeader(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic '
                . base64_encode($this->key . ':' . $this->secret)
        ];
    }

    /**
     * @return string
     */
    public function getTokenRequestUri(): string
    {
        return 'https://connect.bbva.com/token'
            . '?grant_type=authorization_code'
            . '&code=' . $this->authCode
            . '&redirect_uri=' . $this->redirectUri;
    }

    /**
     * @return array
     */
    public function getTokenRequestBody(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getResourceRequestHeader(): array
    {
        return [
            'Authorization' => 'jwt ' . $this->accessToken['access_token'],
            'Accept' => 'application/json',
        ];
    }

    /**
     * @return array
     */
    public function getAccounts(): array
    {
        $accounts = [];

        $responseArray = $this->getResource('https://apis.bbva.com/accounts-sbx/v1/me/accounts');

        foreach ($responseArray['data']['accounts'] as $account) {
            $accounts[] = [
                'total' => $account['balance'],
                'currency' => $account['currency'],
                'accountNumber' => $account['id']
            ];
        }

        return $accounts;
    }

    public function makeTransfer(array $transfer): array
    {
        return $this->postResource('https://apis.bbva.com/payments-sbx/v1/me/transfers', $transfer);
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function apiRequestHeader(): array
    {
        return [
            'Authorization' => 'jwt ' . $this->accessToken['access_token'],
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
    }

}

