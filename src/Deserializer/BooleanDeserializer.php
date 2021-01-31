<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use Softwarewisdom\Diem\ByteBuffer;

/**
 * Class BooleanDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class BooleanDeserializer implements Deserializer
{
    /**
     * @var ByteBuffer
     */
    private ByteBuffer $buffer;
    /**
     * @var bool
     */
    private bool $result;

    /**
     * U64Deserializer constructor.
     * @param ByteBuffer $byteBuffer
     */
    public function __construct(ByteBuffer $byteBuffer)
    {
        $this->buffer = $byteBuffer;
    }

    /**
     * @return BooleanDeserializer
     */
    public function run(): BooleanDeserializer
    {
        $byte = $this->buffer->next();
        if ($byte === 0) {
            $this->result = false;
        } elseif ($byte === 1) {
            $this->result = true;
        }

        throw new \RuntimeException(__CLASS__ . ' invalid boolean value: ' . $byte);
    }

    /**
     * @return bool
     */
    public function value(): bool
    {
        return $this->result;
    }
}
