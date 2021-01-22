<?php
namespace Softwarewisdom\Diem;

class DiemTestnetCoin implements CoinInterface
{
    /** @var int */
    protected $value;
    
    /** @var int  */
    protected $sequenceNumber;
    
    /** @var string */
    protected $key;
    
    /**
     * @param int $value
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

    public function sequenceNumber(): int
    {
        return $this->sequenceNumber;
    }

    public function setAuthKey(string $key)
    {
        $this->key = $key;
    }

    public function getAuthkey(): string
    {
        return $this->key;
    }

    public function address(): string
    {
        return $this->address;
    }
}