<?php

namespace Softwarewisdom\Diem\TestNet;

use GuzzleHttp\Client;

/**
 * Class TestnetFaucetService
 * @package Softwarewisdom\Diem\TestNet
 */
class TestnetFaucetService
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $authKey;

    /**
     * TestnetFaucetService constructor.
     * @param string $url
     * @param string $authKey
     */
    public function __construct(string $url, string $authKey)
    {
        $this->url = $url;
        $this->authKey = $authKey;
    }

    /**
     * @param array<mixed> $options
     * @return Client
     */
    public function endpoint(array $options = []): Client
    {
        if (isset($options['verify']) === false) {
            $options['verify'] = false;
        }
        return new Client($options);
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function authKey(): string
    {
        return $this->authKey;
        //return '68b1282b91de2c054c36629cb8dd447f12f096d3e3c587978dc2248444633483';
        //return hash('sha256', 'The quick brown fox jumped over the lazy dog.');
    }
}
