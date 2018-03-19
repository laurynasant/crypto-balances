<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\CoineggClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class CoineggClientTest extends TestCase {
  /**
   * CoineggClient class instance
   *
   * @var CoineggClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new CoineggClient("123", "123");
      parent::__construct();
  }

  public function testCoineggInstance(): void
  {
    $this->assertInstanceOf(CoineggClient::class, $this->client);
  }

  public function testCoineggExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "CoinEgg");
  }

  public function testCoineggClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testCoineggGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
