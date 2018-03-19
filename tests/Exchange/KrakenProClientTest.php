<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\KrakenClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class KrakenClientTest extends TestCase {
  /**
   * KrakenClient class instance
   *
   * @var KrakenClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new KrakenClient("123", "123");
      parent::__construct();
  }

  public function testKrakenInstance(): void
  {
    $this->assertInstanceOf(KrakenClient::class, $this->client);
  }

  public function testKrakenExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "Kraken");
  }

  public function testKrakenClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testKrakenGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
