<?php
namespace Softwarewisdom\Diem;

use \GuzzleHttp\Client;

class TestnetFaucetService
{
    protected $url;
    protected $authKey;

    public function __construct(string $url, string $authKey)
    {
        $this->url = $url;
        $this->authKey = $authKey;
    }

    public function endpoint(array $options = []): Client
    {
        if (isset($options['verify']) === false) {
            $options['verfiy'] = false;    
        }
        return new \GuzzleHttp\Client($options);
    }

    public function url(): string
    {
        return $this->url;
    }

    public function authKey(): string
    {
        return $this->authKey;
        //return '68b1282b91de2c054c36629cb8dd447f12f096d3e3c587978dc2248444633483';
        //return hash('sha256', 'The quick brown fox jumped over the lazy dog.');
    }
}