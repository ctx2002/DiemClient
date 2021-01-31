<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

/**
 * Class StringDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class StringDeserializer implements Deserializer
{
    /**
     * @var BytesDeserializer
     */
    private BytesDeserializer $deserializer;
    /**
     * @var string
     */
    private string $result;

    /**
     * StringDeserializer constructor.
     * @param BytesDeserializer $deserializer
     */
    public function __construct(BytesDeserializer $deserializer)
    {
        $this->deserializer = $deserializer;
    }

    /**
     * @return $this
     */
    public function run(): StringDeserializer
    {
        $bytes = $this->deserializer->run()->value();
        $string = implode(array_map("mb_chr", $bytes, ['UTF-8']));
        $answer = mb_check_encoding($string, 'UTF-8');
        if ($answer === false) {
            throw new \RuntimeException('Invalid UTF-8 string');
        }

        $this->result = mb_convert_encoding($string, 'utf-8');
        return $this;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->result;
    }
}
