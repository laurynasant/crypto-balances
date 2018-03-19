<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\PoloniexClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class PoloniexClientTest extends TestCase {
  /**
   * PoloniexClient class instance
   *
   * @var PoloniexClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new PoloniexClient("123", "123");
      parent::__construct();
  }

  public function testPoloniexInstance(): void
  {
    $this->assertInstanceOf(PoloniexClient::class, $this->client);
  }

  public function testPoloniexExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "Poloniex");
  }

  public function testPoloniexClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testPoloniexGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
