<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem;

use OutOfBoundsException;

/**
 * Class ByteBuffer
 * @package Softwarewisdom\Diem
 */
class ByteBuffer
{
    /**
     * @var int $index
     *
     * current position
     * ***/
    private int $index = 0;

    /**
     * @var array<int>
     * **/
    private array $bytes;

    /**
     * ByteBuffer constructor.
     * @param array<int> $decodedString
     */
    public function __construct(array $decodedString)
    {
        $this->bytes = $decodedString;
    }

    /**
     * @return int[]
     */
    public function bytes(): array
    {
        return $this->bytes;
    }

    /**
     * @return int
     */
    public function next(): int
    {
        if ($this->index > count($this->bytes)) {
            throw new OutOfBoundsException('byte buffer index out of bound.');
        }

        return $this->bytes[$this->index++];
    }

    /**
     *
     */
    public function rewind(): void
    {
        $this->index = 0;
    }

    /**
     * @param int $pos
     */
    public function setPosition(int $pos): void
    {
        $this->index = $pos;
    }

    /**
     * @return int
     */
    public function position(): int
    {
        return $this->index;
    }
}
