<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\BitzClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class BitzClientTest extends TestCase {
  /**
   * BitzClient class instance
   *
   * @var BitzClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new BitzClient("123", "123");
      parent::__construct();
  }

  public function testBitzInstance(): void
  {
    $this->assertInstanceOf(BitzClient::class, $this->client);
  }

  public function testBitzExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "Bit-Z");
  }

  public function testBitzClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testBitzGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
