<?php

namespace Softwarewisdom\Diem\JsonRPC;

/**
 * Class JsonRPCRequests
 * @package Softwarewisdom\Diem\JsonRPC
 */
class JsonRPCRequests
{
    use JsonRPCSerializer;

    /**
     * @var array<JsonRPCRequest>
     */
    public array $requests = [];

    public function batch(): string
    {
        return $this->serializer()->serialize($this->requests, 'json');
    }
}
