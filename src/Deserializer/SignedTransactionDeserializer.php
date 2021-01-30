<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;


/**
 * Class SignedTransactionDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class SignedTransactionDeserializer extends DiemTypeDeserializer implements Deserializer
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