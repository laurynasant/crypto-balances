<?php declare(strict_types=1);

use Orca\CryptoBalances\Service\ExchangeRateClient;
use PHPUnit\Framework\TestCase;

class ExchangeRateClientTest extends TestCase {
  /**
   * ExchangeRateClient class instance
   *
   * @var ExchangeRateClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new ExchangeRateClient();
      parent::__construct();
  }

  public function testExchangeRateClientInstance(): void
  {
    $this->assertInstanceOf(ExchangeRateClient::class, $this->client);
  }

}
