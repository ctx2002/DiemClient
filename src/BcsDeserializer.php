<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem;

use OverflowException;
use Softwarewisdom\LEB128\Unsigned\Decode;

class BcsDeserializer
{
    public const MAX_UINT_32 = (2 ^ 32) - 1;
    /**
     * @var int[]
     */
    private array $hex;

    /**
     * BcsDeserializer constructor.
     * @param array<int> $hex
     */
    public function __construct(array $hex)
    {
        $this->hex = $hex;
    }

    public function deserializeLen(): int
    {
        //get 4 bytes
        $subArray = array_slice($this->hex, 0, 4);
        $decode = new Decode($subArray);
        $decode->decode();
        if ($decode->value() > self::MAX_UINT_32) {
            throw new OverflowException('Overflow while parsing length.');
        }
        return $decode->value();
    }
}
