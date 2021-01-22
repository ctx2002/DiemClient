<?php
namespace Softwarewisdom\Diem;

use \GuzzleHttp\Client;

class TestNetAccount implements AccountInterface
{
    /** @var TestnetFaucetService $testnet*/
    protected $options;
    /** @var string */
    protected $key;

    public function __construct(
        TestnetFaucetService $testnet
    ) {
        $this->testnet = $testnet;
    }

    public function create(): AccountInterface
    {
        return $this;
    }

    public function address(): string
    {
        return '000000000000000000000000000000DD';
    }

    public function mint(int $amount, string $currencyCode = 'XUD'): CoinInterface
    {
        $client = $this->testnet->endpoint();
        if ($this->key === null) {
            $this->key = $this->testnet->authKey();
        }

        $url = $this->testnet->url();
        $url .= '?amount='.$amount.'&auth_key=' . $this->key;
        $url .= '&currency_code=XUD';
        $response = $client->request(
            'POST', 
            $url
        );

        $coin = new DiemTestnetCoin(
            $amount,
            (int)$response->getBody()->getContents(),
            $this->address()
        );
        $coin->setAuthkey($this->key);
        return $coin;
    }
}