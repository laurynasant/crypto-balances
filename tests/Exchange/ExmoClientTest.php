<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\ExmoClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class ExmoClientTest extends TestCase {
  /**
   * ExmoClient class instance
   *
   * @var ExmoClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new ExmoClient("123", "123");
      parent::__construct();
  }

  public function testExmoInstance(): void
  {
    $this->assertInstanceOf(ExmoClient::class, $this->client);
  }

  public function testExmoExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "EXMO");
  }

  public function testExmoClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testExmoGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
