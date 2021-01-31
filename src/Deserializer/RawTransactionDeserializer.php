<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;

use Softwarewisdom\Diem\ByteBuffer;
use Softwarewisdom\Diem\DiemCounter;
use Softwarewisdom\Diem\DiemTypes\RawTransaction;

/**
 * Class RawTransactionDeserializer
 * @package Softwarewisdom\Diem\Deserializer
 */
class RawTransactionDeserializer extends DiemTypeDeserializer implements Deserializer
{
    /**
     * @var RawTransaction
     */
    private RawTransaction $raw;

    public function __construct(RawTransaction $raw, ByteBuffer $byteBuffer, DiemCounter $counter)
    {
        parent::__construct($byteBuffer, $counter);
        $this->raw = $raw;
    }

    /**
     * @return RawTransactionDeserializer
     */
    public function run(): RawTransactionDeserializer
    {
        $this->containerSizeDecrease();
        $acc = new AccountAddressDeserializer($this->buffer, $this->counter);
        $this->raw->sender = $acc->run()->value();
        $this->raw->sequenceNumber = $this->sequenceNumber();
        return $this;
    }

    public function value(): RawTransaction
    {
        return $this->raw;
    }


    /**
     * @return int
     */
    protected function sequenceNumber(): int
    {
        $value = 0;
        for ($i = 0; $i < 64; $i += 8) {
            $byte = $this->buffer->next();
            $value |= ($byte << $i);
        }
        return $value;
    }

    protected function transactionPayload()
    {
        $index = new VariantIndexDeserializer($this->buffer, $this->counter);
        $caseNubmer = $index->run()->value();
        var_dump($index);
    }
}
