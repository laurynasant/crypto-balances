<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Enum;

use MabeEnum\Enum;

/**
 * @method static FiatCurrency EUR()
 */
class FiatCurrency extends Enum
{
    const EUR = 'eur';
    const USD = 'usd';
    const GBP = 'gbp';
}
