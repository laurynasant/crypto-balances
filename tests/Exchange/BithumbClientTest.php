<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\BithumbClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class BithumbClientTest extends TestCase {
  /**
   * BithumbClient class instance
   *
   * @var BithumbClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new BithumbClient("123", "123");
      parent::__construct();
  }

  public function testBithumbInstance(): void
  {
    $this->assertInstanceOf(BithumbClient::class, $this->client);
  }

  public function testBithumbExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "Bithumb");
  }

  public function testBithumbClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testBithumbGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
