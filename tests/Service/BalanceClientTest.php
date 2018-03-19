<?php declare(strict_types=1);

use Orca\CryptoBalances\Service\BalanceClient;
use PHPUnit\Framework\TestCase;

class BalanceClientTest extends TestCase {
  /**
   * BalanceClient class instance
   *
   * @var BalanceClient
   */
  private $client;

  public function __construct()
  {
      $this->client = new BalanceClient();
      parent::__construct();
  }

  public function testBalanceClientInstance(): void
  {
    $this->assertInstanceOf(BalanceClient::class, $this->client);
  }

}
