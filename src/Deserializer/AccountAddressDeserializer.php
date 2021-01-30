<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use Softwarewisdom\Diem\ByteBuffer;
use Softwarewisdom\Diem\DiemCounter;
use Softwarewisdom\Diem\DiemTypes\AccountAddress;

/**
 * Class AccountAddressDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class AccountAddressDeserializer extends DiemTypeDeserializer implements Deserializer
{
    /**
     * @var AccountAddress
     */
    private AccountAddress $accountAddress;

    /**
     * AccountAddressDeserializer constructor.
     * @param ByteBuffer $byteBuffer
     * @param DiemCounter $counter
     */
    public function __construct(ByteBuffer $byteBuffer, DiemCounter $counter)
    {
        parent::__construct($byteBuffer, $counter);
        $this->accountAddress = new AccountAddress();
    }

    /**
     * @return $this
     */
    public function run(): AccountAddressDeserializer
    {
        $this->containerSizeDecrease();
        $this->getArrayOfUint8();
        $this->containerSizeIncrease();
        return $this;
    }

    public function value(): AccountAddress
    {
        return $this->accountAddress;
    }

    /**
     *
     */
    protected function getArrayOfUint8(): void
    {
        $size = $this->accountAddress->uint8->getSize();
        for ($i = 0; $i < $size; $i++) {
            $se = new UInt8Deserializer($this->buffer);
            $this->accountAddress->uint8[$i] = $se->run()->value();
        }
    }
}
