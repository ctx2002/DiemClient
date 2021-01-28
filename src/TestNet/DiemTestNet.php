<?php

namespace Softwarewisdom\Diem\TestNet;

use Softwarewisdom\Diem\DiemNetInterface;
use Softwarewisdom\Diem\AccountInterface;
use Softwarewisdom\Diem\CoinInterface;

class DiemTestNet implements DiemNetInterface
{
    /**
     * @var string $url
     *
    */
    protected $url;
    /** @var string
     *
     * use hash('sha256', 'The quick brown fox jumped over the lazy dog.');
     * to generate a authkey.
     */
    protected $authKey;

    public function __construct(string $url, string $authKey)
    {
        $this->url = $url;
        $this->authKey = $authKey;
    }

    public function account(): AccountInterface
    {
        $testnet = new TestnetFaucetService($this->url, $this->authKey);
        return new TestNetAccount($testnet);
    }

    public function mint(AccountInterface $account): CoinInterface
    {
        $testnet = new TestnetFaucetService($this->url, $this->authKey);
        $param = new MintParam();
        $param->amount = 300;
        $param->authKey = $this->authKey;
        //$param->returnTxns = 'false';

        return (new TestNetMint($account, $testnet, $param))->mint();
    }
}
