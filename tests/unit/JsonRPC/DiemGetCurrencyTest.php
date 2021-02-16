<?php

namespace unit\JsonRPC;

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use Softwarewisdom\Diem\JsonRPC\CurrencyClient;
use Softwarewisdom\Diem\JsonRPC\JsonRPCRequest;
use Softwarewisdom\Diem\JsonRPC\JsonRPCRequests;
use Softwarewisdom\Diem\JsonRPC\JsonRPCResponse;
use Softwarewisdom\Diem\JsonRPC\JsonRPCResponses;
use Softwarewisdom\Diem\JsonRPC\JsonRPCSerializer;
use Softwarewisdom\Diem\JsonRPC\DiemGetCurrency;
use Softwarewisdom\Diem\Query\Currency;

class DiemGetCurrencyTest extends Unit
{
    // tests
    public function testRun(): void
    {
        $g = new class {
            use JsonRPCSerializer;
        };
        $model = new JsonRPCRequest();
        $model->id = 1;
        $model->jsonMethod = 'get_currencies';
        $model->params = [];

        $model2 = new JsonRPCRequest();
        $model2->id = 2;
        $model2->jsonMethod = 'get_currencie';
        $model2->params = [];

        $reqs = new JsonRPCRequests();
        $reqs->requests[] = $model;
        //$reqs->requests[] = $model2;

        $result = CurrencyClient::exec($reqs, 'https://testnet.diem.com/v1');
        //var_dump(json_encode(($result->responses[0])->result)); die();
        /*$f = $g->serializer()->deserialize(
            json_encode(($result->responses[0])->result),
            '\Softwarewisdom\Diem\DiemTypes\CurrencyInfo[]',
            'json'
        );
        var_dump($f); die();*/
        var_dump($result->responses[0]->result); die();
    }
}
