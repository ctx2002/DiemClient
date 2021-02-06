<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\JsonRPC;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Softwarewisdom\Diem\Query\Currency;

class CurrencyClient
{
    /**
     * @param JsonRPCRequests $models
     * @param string $url
     * @return JsonRPCResponses
     * @throws GuzzleException
     * @throws JsonException
     */
    public static function exec(JsonRPCRequests $models, string $url): JsonRPCResponses
    {
        $currency = new DiemGetCurrency($models);
        $query = new Currency($currency, $url, new Client(['verify' => false]));
        $resp = $query->query();

        $re = new JsonRPCResponses();
        $r = $re->deserializer($resp);

        if (is_array($r) === true) {
            $re->responses = $r;
        } else {
            $re->responses[] = $r;
        }
        return $re;
    }
}
