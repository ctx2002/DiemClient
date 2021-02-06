<?php

namespace Softwarewisdom\Diem\TestNet;

use GuzzleHttp\Exception\GuzzleException;
use Softwarewisdom\Diem\MintInterface;
use Softwarewisdom\Diem\CoinInterface;
use Softwarewisdom\Diem\AccountInterface;

/**
 * Class TestNetMint
 * @package Softwarewisdom\Diem\TestNet
 */
class TestNetMint implements MintInterface
{
    /**
     * @var AccountInterface
    */
    private $account;

    /**
     * @var MintParam
    */
    private $bag;
    /**
     * @var TestnetFaucetService
     */
    private $service;

    /**
     * @param  AccountInterface $testNetAccount
     * @param  TestnetFaucetService $service
     * @param  MintParam $bag
     * * */
    public function __construct(AccountInterface $testNetAccount, TestnetFaucetService $service, MintParam $bag)
    {
        $this->account = $testNetAccount;
        $this->bag = $bag;
        $this->service = $service;
    }

    /**
     * @return CoinInterface
     * @throws GuzzleException
     */
    public function mint(): CoinInterface
    {
        $key = $this->bag->authKey;

        $url = $this->service->url();
        $url .= '?amount=' . $this->bag->amount . '&auth_key=' . $key;
        $url .= '&currency_code=' . $this->bag->currencyCode;
        $url .= '&return_txns=' . $this->bag->returnTxns;

        $client = $this->service->endpoint();

        $response = $client->request(
            'POST',
            $url
        );

        $coin = new DiemTestnetCoin(
            $this->bag->amount,
            (int)$response->getBody()->getContents(),
            $this->account->address()
        );
        $coin->setAuthKey($this->account->authKey());
        return $coin;
    }
}
