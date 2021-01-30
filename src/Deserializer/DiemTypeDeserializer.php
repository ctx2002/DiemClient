<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use OverflowException;
use RuntimeException;
use Softwarewisdom\Diem\ByteBuffer;
use Softwarewisdom\Diem\DiemCounter;

/**
 * Class DiemTypeDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class DiemTypeDeserializer
{
    /**
     * @var ByteBuffer
     */
    protected ByteBuffer $buffer;

    /**
     * @var DiemCounter
     */
    private DiemCounter $counter;

    /**
     * DiemTypeDeserializer constructor.
     * @param ByteBuffer $byteBuffer
     * @param DiemCounter $counter
     */
    public function __construct(ByteBuffer $byteBuffer, DiemCounter $counter)
    {
        $this->buffer = $byteBuffer;
        $this->counter = $counter;
    }

    /**
     * @return array<int>
     *
     */
    public function uleb128Bytes(): array
    {
        $digits = [];
        //use 4 here, because 32 bit integer is 4 bytes long.
        for ($i = 0; $i < 4; $i++) {
            $byte = $this->buffer->next();
            $digit = $byte & 0x7F;
            $digits[] = $digit;

            if ($digit === $byte) {
                if ($i > 0 && $digit === 0) {
                    throw new RuntimeException("unexpected uleb128 number, digit is zero");
                }
                return $digits;
            }

        }
        throw new OverflowException('Overflow while parsing uleb128 number');
    }

    public function containerSizeDecrease(): void
    {
        $this->counter->containerSizeDecrease();
    }

    public function containerSizeIncrease(): void
    {
        $this->counter->containerSizeIncrease();
    }
}
