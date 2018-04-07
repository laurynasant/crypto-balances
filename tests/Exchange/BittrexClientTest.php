<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\BittrexClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class BittrexClientTest extends TestCase {
    /**
     * BittrexClient class instance
     *
     * @var BittrexClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new BittrexClient("123", "123");
        parent::__construct();
    }

    public function testBittrexInstance(): void
    {
        $this->assertInstanceOf(BittrexClient::class, $this->client);
    }

    public function testBittrexExchangeName(): void
    {
        $this->assertEquals($this->client->getName(), "Bittrex");
    }

    public function testBittrexClientInstance(): void
    {
        $this->assertInstanceOf(Exchange::class, $this->client->getClient());
    }

    // public function testBittrexGetBalanceList(): void
    // {
    //     $this->assertEquals($this->client->getBalanceList(), "");
    // }

}
