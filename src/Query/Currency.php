<?php

namespace Softwarewisdom\Diem\Query;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use Softwarewisdom\Diem\JsonRPC\JsonRPCAction;

/**
 * Class Currency
 * @package Softwarewisdom\Diem\Query
 */
class Currency
{
    /**
     * @var JsonRPCAction
     */
    private JsonRPCAction $action;
    /**
     * @var string
     */
    private string $url;
    /**
     * @var ClientInterface
     */
    private ClientInterface $client;

    /**
     * Currency constructor.
     * @param JsonRPCAction $action
     * @param string $url
     * @param ClientInterface $client
     */
    public function __construct(JsonRPCAction $action, string $url, ClientInterface $client)
    {
        $this->action = $action;
        $this->url = $url;
        $this->client = $client;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function query(): ResponseInterface
    {
        $body = $this->action->run();

        $request = new Request(
            'post',
            $this->url,
            ['content-type' => 'application/json'],
            $body
        );

        return $this->client->send($request);
    }
}
