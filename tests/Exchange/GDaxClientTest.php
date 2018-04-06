<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\GDaxClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class GDaxClientTest extends TestCase {
    /**
     * GDaxClient class instance
     *
     * @var GDaxClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new GDaxClient("123", "123");
        parent::__construct();
    }

    public function testGDaxInstance(): void
    {
        $this->assertInstanceOf(GDaxClient::class, $this->client);
    }

    public function testGDaxExchangeName(): void
    {
        $this->assertEquals($this->client->getName(), "GDax");
    }

    public function testGDaxClientInstance(): void
    {
        $this->assertInstanceOf(Exchange::class, $this->client->getClient());
    }

    // public function testGDaxClientGetBalanceList(): void
    // {
    //     $this->assertEquals($this->client->getBalanceList(), "");
    // }

}
