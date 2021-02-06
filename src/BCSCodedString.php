<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem;

/**
 * Class BCSCodedString
 * @package Softwarewisdom\Diem
 */
class BCSCodedString
{

    /**
     * @var string
     */
    private string $bcs;
    /**
     * @var array<int>
     */
    private array $bytes;

    /**
     * BCSCodedString constructor.
     * @param string $codedString
     */
    public function __construct(string $codedString)
    {
        $this->bcs = $codedString;
    }


    /**
     * @return $this
     */
    public function decode(): self
    {
        $r = str_split($this->bcs, 2);
        $this->bytes = array_map(
            static function (string $item): int {
                return intval($item, 16);
            },
            $r
        );
        return $this;
    }

    /**
     * @return int[]
     */
    public function value(): array
    {
        return $this->bytes;
    }
}
