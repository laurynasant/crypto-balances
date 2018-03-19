<?php declare(strict_types=1);

use Orca\CryptoBalances\Enum\FiatCurrency;
use PHPUnit\Framework\TestCase;

class FiatCurrencyTest extends TestCase {

  public function testEur(): void
  {
    $this->assertTrue(FiatCurrency::EUR == 'eur');
  }

}
