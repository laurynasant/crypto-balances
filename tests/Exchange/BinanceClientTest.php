<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\BinanceClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class BinanceClientTest extends TestCase {
  /**
   * BinanceClient class instance
   *
   * @var BinanceClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new BinanceClient("123", "123");
      parent::__construct();
  }

  public function testBinanceInstance(): void
  {
    $this->assertInstanceOf(BinanceClient::class, $this->client);
  }

  public function testBinanceExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "Binance");
  }

  public function testBinanceClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testBinanceGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
