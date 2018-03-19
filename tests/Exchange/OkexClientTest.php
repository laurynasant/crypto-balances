<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\OkexClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class OkexClientTest extends TestCase {
  /**
   * OkexClient class instance
   *
   * @var OkexClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new OkexClient("123", "123");
      parent::__construct();
  }

  public function testOkexInstance(): void
  {
    $this->assertInstanceOf(OkexClient::class, $this->client);
  }

  public function testOkexExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "OKEx");
  }

  public function testOkexClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testOkexGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
