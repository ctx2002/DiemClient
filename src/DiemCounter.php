<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem;

use RuntimeException;

/**
 * Class DiemCounter
 * @package Softwarewisdom\Diem
 */
class DiemCounter
{
    /**
     * @var int
     */
    private int $maxDepth;

    /**
     * DiemCounter constructor.
     */
    public function __construct(int $maxDepth = 500)
    {
        $this->maxDepth = $maxDepth;
    }

    /**
     *
     */
    public function containerSizeDecrease(): void
    {
        if ($this->maxDepth === 0) {
            throw new RuntimeException('exceeded maximum container depth');
        }
        --$this->maxDepth;
    }

    /**
     *
     */
    public function containerSizeIncrease(): void
    {
        ++$this->maxDepth;
    }
}
