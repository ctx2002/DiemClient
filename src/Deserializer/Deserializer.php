<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

/**
 * Interface Deserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
interface Deserializer
{
    /**
     *
     */
    public function run(): self;
}
