<?php
namespace Softwarewisdom\Diem;

interface CoinInterface
{
    public function value(): int;
    public function sequenceNumber(): int;
    public function address(): string;
}