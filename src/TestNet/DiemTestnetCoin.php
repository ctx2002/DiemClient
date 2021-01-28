<?php

namespace Softwarewisdom\Diem\TestNet;

use Softwarewisdom\Diem\CoinInterface;

/**
 * Class DiemTestnetCoin
 * @package Softwarewisdom\Diem\TestNet
 */
class DiemTestnetCoin implements CoinInterface
{
    /** @var int */
    protected $value;
/** @var int  */
    protected $sequenceNumber;
/** @var string */
    protected $key;
    /**
     * @var string
     */
    private $address;

    /**
     * @param int $value
     * @param int $sequenceNumber
     * @param string $address
     */
    public function __construct(int $value, int $sequenceNumber, string $address)
    {
        $this->value = $value;
        $this->sequenceNumber = $sequenceNumber;
        $this->address = $address;
    }

    /** @return int */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function sequenceNumber(): int
    {
        return $this->sequenceNumber;
    }

    /**
     * @param string $key
     */
    public function setAuthKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getAuthkey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function address(): string
    {
        return $this->address;
    }
}
