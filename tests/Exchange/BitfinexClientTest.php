<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\BitfinexClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class BitfinexClientTest extends TestCase {
    /**
     * BitfinexClient class instance
     *
     * @var BitfinexClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new BitfinexClient("123", "123");
        parent::__construct();
    }

    public function testBitfinexInstance(): void
    {
        $this->assertInstanceOf(BitfinexClient::class, $this->client);
    }

    public function testBitfinexExchangeName(): void
    {
        $this->assertEquals($this->client->getName(), "Bitfinex");
    }

    public function testBitfinexClientInstance(): void
    {
        $this->assertInstanceOf(Exchange::class, $this->client->getClient());
    }
    

}
