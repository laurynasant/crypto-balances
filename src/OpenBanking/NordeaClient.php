<?php declare(strict_types=1);

namespace Orca\CryptoBalances\OpenBanking;

use GuzzleHttp\Client;

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
     * @return array
     */
    public function getAccounts(): array
    {
        $accounts = [];

        $response = (new Client())->get('https://api.nordeaopenbanking.com/v2/accounts',
          [
            'headers' => [
              'X-IBM-Client-Id'     => $this->key,
              'X-IBM-Client-Secret' => $this->secret,
              'Authorization'       => 'Bearer '.$this->getToken()
            ]
          ]
        );
        $responseArray = json_decode($response->getBody()->getContents(), true);

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
     * @return array
     */
    private function getToken(): string
    {
        $response = (new Client())->post('https://api.nordeaopenbanking.com/v1/authentication/access_token', [
              'headers' => [
                'X-IBM-Client-Id'     => $this->key,
                'X-IBM-Client-Secret' => $this->secret,
              ],
              'form_params' => [
                  'code'         => $this->authCode,
                  'redirect_uri' => $this->redirectUri
              ]
            ]
          );
        $responseArray = json_decode($response->getBody()->getContents(), true);

        return $responseArray['access_token'];
    }
}
