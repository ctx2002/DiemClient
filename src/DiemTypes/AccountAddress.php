<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;

use SplFixedArray;

use function json_encode;

/**
 * Class AccountAddress
 * @package Softwarewisdom\Diem\DiemTypes
 */
class AccountAddress
{

    /**
     * @var SplFixedArray<int>
     */
    public SplFixedArray $uint8;

    public function __construct()
    {
        $this->uint8 = new SplFixedArray(16);
    }

    public function __toString()
    {
        $r = json_encode($this->uint8->toArray(), JSON_THROW_ON_ERROR);
        if ($r === false) {
            throw new \RuntimeException(__CLASS__ . " " . \json_last_error_msg());
        }
        return $r;
    }
}
