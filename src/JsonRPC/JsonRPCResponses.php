<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\JsonRPC;

use JsonException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class JsonRPCResponses
 * @package Softwarewisdom\Diem\JsonRPC
 */
class JsonRPCResponses
{
    use JsonRPCSerializer;

    /**
     * @var array<JsonRPCResponse>
     */
    public array $responses = [];

    /**
     * @param ResponseInterface $response
     * @return array<JsonRPCResponse>|JsonRPCResponse
     * @throws JsonException
     */
    public function deserializer(ResponseInterface $response)
    {
        $body = $response->getBody()->getContents();
        //var_dump($body); die();
        $result = json_decode($body, false, 512, JSON_THROW_ON_ERROR);
        if (is_array($result) === false) {
            return $this->serializer()->deserialize(
                $body,
                JsonRPCResponse::class,
                'json'
            );
        }

        return $this->serializer()->deserialize(
            $body,
            '\Softwarewisdom\Diem\JsonRPC\JsonRPCResponse[]',
            'json'
        );
    }
}
