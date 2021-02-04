<?php

namespace unit\JsonRPC;

use Codeception\Test\Unit;
use GuzzleHttp\Client;
use Softwarewisdom\Diem\JsonRPC\JsonRPCRequest;
use Softwarewisdom\Diem\JsonRPC\JsonRPCRequests;
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
        $model2->jsonMethod = 'get_currencies';
        $model2->params = [];

        $reqs = new JsonRPCRequests();
        $reqs->requests[] = $model;
        //$reqs->requests[] = $model2;
        //$r = $g->serializer()->serialize($reqs->requests, 'json');
        //var_dump($r); die();
        //$a = $g->serializer()->serialize($model, 'json');
        //var_dump($a); die();
        $currency = new DiemGetCurrency($reqs);
        $query = new Currency($currency, 'https://testnet.diem.com/v1', new Client(['verify' => false]));
        $resp = $query->query();
        var_dump( $resp->getBody()->getContents());
        //var_dump($currency->run());
        die();
    }
}
