<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;

use JsonException;
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

    /**
     * AccountAddress constructor.
     */
    public function __construct()
    {
        $this->uint8 = new SplFixedArray(16);
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function __toString(): string
    {
        return json_encode($this->uint8->toArray(), JSON_THROW_ON_ERROR);
    }
}
