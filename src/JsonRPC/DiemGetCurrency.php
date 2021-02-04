<?php

namespace Softwarewisdom\Diem\JsonRPC;

/**
 * Class DiemGetCurrency
 * @package Softwarewisdom\Diem\JsonRPC
 */
class DiemGetCurrency implements JsonRPCAction
{
    /**
     * @var JsonRPCRequests
     */
    private JsonRPCRequests $models;

    /**
     * DiemGetCurrency constructor.
     * @param JsonRPCRequests $getCurrencyModels
     */
    public function __construct(JsonRPCRequests $getCurrencyModels)
    {
        $this->models = $getCurrencyModels;
    }

    /**
     * @return string
     */
    public function run(): string
    {
        if (count($this->models->requests) === 1) {
            return ($this->models->requests[0])->exec();
        }
        return $this->models->batch();
    }
}
