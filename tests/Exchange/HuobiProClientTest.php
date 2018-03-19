<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\HuobiProClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class HuobiProClientTest extends TestCase {
  /**
   * HuobiClient class instance
   *
   * @var HuobiProClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new HuobiProClient("123", "123");
      parent::__construct();
  }

  public function testHuobiInstance(): void
  {
    $this->assertInstanceOf(HuobiProClient::class, $this->client);
  }

  public function testHuobiExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "Huobi Pro");
  }

  public function testHuobiClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testHuobiGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
