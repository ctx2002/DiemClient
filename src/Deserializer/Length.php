<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use OverflowException;
use Softwarewisdom\LEB128\Unsigned\Decode;

/**
 * Class Length
 * @package Softwarewisdom\Diem\Deserializer
 */
class Length extends DiemTypeDeserializer implements Deserializer
{
    /**
     *
     */
    public const MAX_UINT_32 = (2 ^ 32) - 1;
    /**
     * @var Decode
     */
    private Decode $decode;


    /**
     * @return $this
     */
    public function run(): Length
    {
        $this->decode = new Decode($this->uleb128Bytes());
        $this->decode->decode();
        if ($this->decode->value() > self::MAX_UINT_32) {
            throw new OverflowException('Overflow while parsing length.');
        }
        return $this;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->decode->value();
    }
}
