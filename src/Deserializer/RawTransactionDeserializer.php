<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;


class RawTransactionDeserializer extends DiemTypeDeserializer implements Deserializer
{
    public function run(): Deserializer
    {
        $this->containerSizeDecrease();
    }

    public function value(): int
    {
        // TODO: Implement value() method.
    }

}