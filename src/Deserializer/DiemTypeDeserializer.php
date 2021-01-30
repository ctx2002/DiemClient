<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use RuntimeException;
use Softwarewisdom\Diem\ByteBuffer;

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
     * DiemTypeDeserializer constructor.
     * @param ByteBuffer $byteBuffer
     */
    public function __construct(ByteBuffer $byteBuffer)
    {
        $this->buffer = $byteBuffer;
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
        return $digits;
    }
}
