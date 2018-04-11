<?php declare(strict_types=1);

namespace Orca\CryptoBalances\OpenBanking;

use GuzzleHttp\Client;

/**
 * Class HellenicClient
 * @package Orca\CryptoBalances\OpenBanking
 */
class HellenicClient extends AbstractClient
{

    /**
     * @var string
     */
    public $authCodeKey = 'clientToken';

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'Hellenic';
    }

    /**
     * @return string
     */
    public function getAuthUrl(): string
    {
        return 'https://sandbox-oauth.hellenicbank.com/oauth/authorize'
            . '?clientId=' . $this->key
            . '&scope=report.account.statements'
            . '&state=123456'
            . '&redirectUri=' . $this->redirectUri;
    }

    /**
     * @return array
     */
    public function getTokenRequestHeader(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @return string
     */
    public function getTokenRequestUri(): string
    {
        return 'https://sandbox-oauth.hellenicbank.com/oauth/token'
            . '?clientId=' . $this->key
            . '&clientSecret=' . $this->secret
            . '&clientToken=' . $this->authCode;
    }

    /**
     * @return array
     */
    public function getTokenRequestBody(): array
    {
        return [];
    }

    /**
     * @Overrides
     * @return mixed
     */
    public function getToken(): array
    {
        $response = (new Client())->request(
            'GET',
            $this->getTokenRequestUri(),
            [
                'headers' => $this->getTokenRequestHeader()
            ]
        );

        return json_decode($response->getBody()->getContents(), true)['payload'];
    }

    /**
     * @return array
     */
    public function getResourceRequestHeader(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic '
                . base64_encode($this->key . ':' . $this->secret)
                . ', jwt ' . base64_encode($this->accessToken['accessToken'])
        ];
    }

    /**
     * @return array
     */
    public function getAccounts(): array
    {
        $accounts = [];

        $responseArray = $this->getResource(
            'https://sandbox-apis.hellenicbank.com/v1/account/report'
            . '?account=CY44005000121234567384564932'
            . '&dateFrom=201611010000'
            . '&dateTo=203612312359'
        );

        $accounts[] = [
            'total' => $responseArray['payload']['currentBalance'],
            'currency' => 'EUR',
            'accountNumber' => $responseArray['payload']['accountNumber']
        ];

        return $accounts;
    }

}
