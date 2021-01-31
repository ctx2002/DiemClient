<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

/**
 * Class UnitDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class UnitDeserializer implements Deserializer
{
    /**
     * @return $this
     */
    public function run(): UnitDeserializer
    {
        return $this;
    }

    /**
     * @return array{dummy?:null}
     */
    public function value(): array
    {
        return [];
    }
}
