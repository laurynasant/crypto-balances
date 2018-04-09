<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\BitstampClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class BitstampClientTest extends TestCase {
    /**
     * BitstampClient class instance
     *
     * @var BitstampClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new BitstampClient("123", "123");
        parent::__construct();
    }

    public function testBitstampInstance(): void
    {
        $this->assertInstanceOf(BitstampClient::class, $this->client);
    }

    public function testBitstampExchangeName(): void
    {
        $this->assertEquals($this->client->getName(), "Bitstamp");
    }

    public function testBitstampClientInstance(): void
    {
        $this->assertInstanceOf(Exchange::class, $this->client->getClient());
    }

    // public function testBitstampClientGetBalanceList(): void
    // {
    //     $this->assertEquals($this->client->getBalanceList(), "");
    // }

}
