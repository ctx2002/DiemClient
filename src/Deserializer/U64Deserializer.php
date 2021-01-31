<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use Softwarewisdom\Diem\ByteBuffer;

/**
 * Class U64Deserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class U64Deserializer implements Deserializer
{

    /**
     * @var ByteBuffer
     */
    private ByteBuffer $buffer;
    /**
     * @var int
     */
    private int $result;

    /**
     * U64Deserializer constructor.
     * @param ByteBuffer $byteBuffer
     */
    public function __construct(ByteBuffer $byteBuffer)
    {
        $this->buffer = $byteBuffer;
    }

    /**
     * @return U64Deserializer
     */
    public function run(): U64Deserializer
    {
        $this->result = 0;
        for ($i = 0; $i < 64; $i += 8) {
            $byte = $this->buffer->next();
            $this->result |= ($byte << $i);
        }
        return $this;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->result;
    }
}
