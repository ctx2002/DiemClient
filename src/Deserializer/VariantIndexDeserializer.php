<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use Softwarewisdom\LEB128\Unsigned\Decode;

/**
 * Class VariantIndexDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class VariantIndexDeserializer extends DiemTypeDeserializer implements Deserializer
{
    /**
     * @var Length
     */
    private Length $decode;

    public function run(): VariantIndexDeserializer
    {
        $this->decode = new Length($this->buffer, $this->counter);
        $this->decode->run();
        return $this;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->decode->value();
    }
}
