<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\HitbtcClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class HitbtcClientTest extends TestCase {
  /**
   * HitbtcClient class instance
   *
   * @var HitbtcClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new HitbtcClient("123", "123");
      parent::__construct();
  }

  public function testHitbtcInstance(): void
  {
    $this->assertInstanceOf(HitbtcClient::class, $this->client);
  }

  public function testHitbtcExchangeName(): void
  {
      $this->assertEquals($this->client->getName(), "HitBTC");
  }

  public function testHitbtcClientInstance(): void
  {
      $this->assertInstanceOf(Exchange::class, $this->client->getClient());
  }

  // public function testHitbtcGetBalanceList(): void
  // {
  //     $this->assertEquals($this->client->getBalanceList(), "");
  // }

}
