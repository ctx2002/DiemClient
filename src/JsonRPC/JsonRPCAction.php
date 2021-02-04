<?php

namespace Softwarewisdom\Diem\JsonRPC;

/**
 * Interface JsonRPCAction
 * @package Softwarewisdom\Diem\JsonRPC
 */
interface JsonRPCAction
{
    /**
     * @return string
     */
    public function run(): string;
}
