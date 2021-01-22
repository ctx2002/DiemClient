<?php
namespace Softwarewisdom\Diem;

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
}