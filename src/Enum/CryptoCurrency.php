<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Enum;

use MabeEnum\Enum;

/**
 * @method static CryptoCurrency BTC()
 * @method static CryptoCurrency ETH()
 * @method static CryptoCurrency LTC()
 * @method static CryptoCurrency ETC()
 * @method static CryptoCurrency XRP()
 * @method static CryptoCurrency DASH()
 * @method static CryptoCurrency NEO()
 */
class CryptoCurrency extends Enum
{
    const BTC = 'btc';
    const ETH = 'eth';
    const LTC = 'ltc';
    const ETC = 'etc';
    const XRP = 'xrp';
    const DASH = 'dash';
    const NEO = 'neo';
}
