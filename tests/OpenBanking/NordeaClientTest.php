<?php declare(strict_types=1);

use Orca\CryptoBalances\OpenBanking\NordeaClient;
use PHPUnit\Framework\TestCase;

class NordeaClientTest extends TestCase {
  /**
   * NordeaClient class instance
   *
   * @var NordeaClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new NordeaClient("123", "123", "123", "http://example.com");
      parent::__construct();
  }

  public function testNordeaClientInstance(): void
  {
    $this->assertInstanceOf(NordeaClient::class, $this->client);
  }

  public function testNordeaClientName(): void
  {
      $this->assertEquals($this->client->getName(), "Nordea");
  }

}
