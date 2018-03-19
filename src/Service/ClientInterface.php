<?php declare(strict_types=1);

namespace Orca\CryptoBalances\Service;

interface ClientInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return array
     */
    public function getBalanceList(): array;
}
