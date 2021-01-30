<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem;

/**
 * Class ByteBuffer
 * @package Softwarewisdom\Diem
 */
class ByteBuffer
{

    /**
     * @var string
     */
    private string $bcs;

    /**
     * ByteBuffer constructor.
     * @param string $bcsCodedString
     */
    public function __construct(string $bcsCodedString)
    {
        $this->bcs = $bcsCodedString;
    }

    /**
     * @return array<int>
     */
    public function toHex(): array
    {
        $r = str_split($this->bcs, 2);
        return array_map(
            static function (string $item) {
                return intval($item, 16);
            },
            $r
        );
    }
}
