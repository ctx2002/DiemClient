<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\Deserializer;


use Softwarewisdom\Diem\ByteBuffer;
use Softwarewisdom\Diem\DiemCounter;
use Softwarewisdom\Diem\DiemTypes\AccessPath;

class AccessPathDeserializer extends DiemTypeDeserializer implements Deserializer
{
    /**
     * @var AccessPath
     */
    private AccessPath $accessPath;

    public function __construct(ByteBuffer $byteBuffer, DiemCounter $counter)
    {
        parent::__construct($byteBuffer, $counter);
    }

    public function run(): AccessPathDeserializer
    {
        $this->accessPath = new AccessPath();
        $this->counter->containerSizeDecrease();

        $this->accessPath->accountAddress = (
        new AccountAddressDeserializer($this->buffer, $this->counter)
        )->run()->value();
        $len = (new Length($this->buffer, $this->counter))->run()->value();
        $bytes = [];

        for ($i = 0; $i < $len; $i++) {
            $bytes[] = $this->buffer->next();
        }

        if (count($bytes) < $len) {
            throw new \RuntimeException('no enough access path bytes');
        }

        $this->accessPath->path = $bytes;
        $this->counter->containerSizeIncrease();
        return $this;
    }

    public function value(): AccessPath
    {
        return $this->accessPath;
    }
}