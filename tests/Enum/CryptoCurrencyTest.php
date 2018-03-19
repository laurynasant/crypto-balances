<?php declare(strict_types=1);

use Orca\CryptoBalances\Enum\CryptoCurrency;
use PHPUnit\Framework\TestCase;

class CryptoCurrencyTest extends TestCase {

  public function testBtc(): void
  {
    $this->assertTrue(CryptoCurrency::BTC == 'btc');
  }

  public function testEth(): void
  {
    $this->assertTrue(CryptoCurrency::ETH == 'eth');
  }

}
