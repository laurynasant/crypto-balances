<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\LiquiClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class LiquiClientTest extends TestCase {
  /**
   * LiquiClient class instance
   *
   * @var LiquiClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new LiquiClient("123", "123");
      parent::__construct();
  }

  public function testLiquiInstance(): void
  {
    $this->assertInstanceOf(LiquiClient::class, $this->client);
  }

  public function testLiquiExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "Liqui");
  }

  public function testLiquiClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testLiquiGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
