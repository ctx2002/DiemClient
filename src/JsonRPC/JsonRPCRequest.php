<?php

namespace Softwarewisdom\Diem\JsonRPC;

use Symfony\Component\Serializer\Annotation\SerializedName;

class JsonRPCRequest
{
    use JsonRPCSerializer;

    public string $jsonrpc = "2.0";
    /**
     * @SerializedName("method")
     */
    public string $jsonMethod;
    public array $params;
    public int $id;

    public function exec(): string
    {
        return $this->serializer()->serialize($this, 'json');
    }
}
