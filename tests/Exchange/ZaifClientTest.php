<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\ZaifClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class ZaifClientTest extends TestCase {
    /**
     * ZaifClient class instance
     *
     * @var ZaifClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new ZaifClient("123", "123");
        parent::__construct();
    }

    public function testZaifInstance(): void
    {
        $this->assertInstanceOf(ZaifClient::class, $this->client);
    }

    public function testZaifExchangeName(): void
    {
        $this->assertEquals($this->client->getName(), "Zaif");
    }

    public function testZaifClientInstance(): void
    {
        $this->assertInstanceOf(Exchange::class, $this->client->getClient());
    }


}
