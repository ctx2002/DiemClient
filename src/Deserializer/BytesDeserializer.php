<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use Softwarewisdom\Diem\ByteBuffer;

/**
 * Class BytesDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class BytesDeserializer implements Deserializer
{
    /**
     * @var Length
     */
    private Length $deserializer;
    /**
     * @var ByteBuffer
     */
    private ByteBuffer $buff;
    /**
     * @var array<int>
     * **/
    private array $bytes = [];

    /**
     * BytesDeserializer constructor.
     * @param Length $lenDeserializer
     * @param ByteBuffer $byteBuffer
     */
    public function __construct(Length $lenDeserializer, ByteBuffer $byteBuffer)
    {
        $this->deserializer = $lenDeserializer;
        $this->buff = $byteBuffer;
    }

    /**
     * @return $this
     */
    public function run(): BytesDeserializer
    {
        $len = $this->deserializer->run()->value();

        for ($i = 0; $i < $len; $i++) {
            $this->bytes[] = $this->buff->next();
        }

        if (count($this->bytes) < $len) {
            throw new \RuntimeException(__CLASS__ . ' input is too short: ' . count($this->bytes));
        }
        return $this;
    }

    /**
     * @return array<int>
     */
    public function value(): array
    {
        return $this->bytes;
    }
}
