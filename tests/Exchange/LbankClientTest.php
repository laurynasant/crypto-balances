<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\LbankClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class LbankClientTest extends TestCase {
    /**
     * LbankClient class instance
     *
     * @var LbankClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new LbankClient("123", "123");
        parent::__construct();
    }

    public function testLbankInstance(): void
    {
        $this->assertInstanceOf(LbankClient::class, $this->client);
    }

    public function testLbankExchangeName(): void
    {
        $this->assertEquals($this->client->getName(), "Lbank");
    }

    public function testLbankClientInstance(): void
    {
        $this->assertInstanceOf(Exchange::class, $this->client->getClient());
    }


}
