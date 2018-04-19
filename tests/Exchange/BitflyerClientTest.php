<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\BitflyerClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class BitflyerClientTest extends TestCase {
    /**
     * BitflyerClient class instance
     *
     * @var BitflyerClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new BitflyerClient("123", "123");
        parent::__construct();
    }

    public function testBitflyerInstance(): void
    {
        $this->assertInstanceOf(BitflyerClient::class, $this->client);
    }

    public function testBitflyerExchangeName(): void
    {
        $this->assertEquals($this->client->getName(), "Bitflyer");
    }

    public function testBitflyerClientInstance(): void
    {
        $this->assertInstanceOf(Exchange::class, $this->client->getClient());
    }

}
