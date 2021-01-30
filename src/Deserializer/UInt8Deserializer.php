<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;


use Softwarewisdom\Diem\ByteBuffer;

/**
 * Class UInt8Deserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class UInt8Deserializer implements Deserializer
{
    /**
     * @var ByteBuffer
     */
    private ByteBuffer $buffer;
    private int $byte;

    /**
     * UInt8Deserializer constructor.
     * @param ByteBuffer $byteBuffer
     */
    public function __construct(ByteBuffer $byteBuffer)
    {
        $this->buffer = $byteBuffer;
    }

    public function run(): UInt8Deserializer
    {
        $this->byte = $this->buffer->next();
        return $this;
    }

    public function value(): int
    {
        return $this->byte;
    }

}