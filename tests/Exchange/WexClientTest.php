<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\WexClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class WexClientTest extends TestCase {
  /**
   * WexClient class instance
   *
   * @var WexClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new WexClient("123", "123");
      parent::__construct();
  }

  public function testWexInstance(): void
  {
    $this->assertInstanceOf(WexClient::class, $this->client);
  }

  public function testWexExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "WEX");
  }

  public function testWexClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testWexGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
