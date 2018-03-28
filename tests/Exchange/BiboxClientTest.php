<?php declare(strict_types=1);

use Orca\CryptoBalances\Exchange\BiboxClient;
use ccxt\Exchange;

use PHPUnit\Framework\TestCase;

class BiboxClientTest extends TestCase {
    /**
     * BiboxClient class instance
     *
     * @var BiboxClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new BiboxClient("123", "123");
        parent::__construct();
    }

    public function testBiboxInstance(): void
    {
        $this->assertInstanceOf(BiboxClient::class, $this->client);
    }

    public function testBiboxExchangeName(): void
    {
        $this->assertEquals($this->client->getName(), "Bibox");
    }

    public function testBiboxClientInstance(): void
    {
        $this->assertInstanceOf(Exchange::class, $this->client->getClient());
    }

    // public function testBiboxClientGetBalanceList(): void
    // {
    //     $this->assertEquals($this->client->getBalanceList(), "");
    // }

}
