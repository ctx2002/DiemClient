<?php

namespace Softwarewisdom\Diem\TestNet;

use Softwarewisdom\Diem\AccountInterface;

/**
 * Class TestNetAccount
 * @package Softwarewisdom\Diem\TestNet
 */
class TestNetAccount implements AccountInterface
{
/** @var string */
    protected $key;
    /**
     * @var TestnetFaucetService
     */
    private $testnet;

    /**
     * TestNetAccount constructor.
     * @param TestnetFaucetService $testnet
     */
    public function __construct(TestnetFaucetService $testnet)
    {
        $this->testnet = $testnet;
    }

    /**
     * @return AccountInterface
     */
    public function create(): AccountInterface
    {
        return $this;
    }

    /**
     * @return string
     */
    public function address(): string
    {
        return '000000000000000000000000000000DD';
    }

    /**
     * @return string
     */
    public function authKey(): string
    {
        if ($this->key === null) {
            $this->key = $this->testnet->authKey();
        }
        return $this->key;
    }
}
