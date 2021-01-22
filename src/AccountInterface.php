<?php
namespace Softwarewisdom\Diem;

interface AccountInterface
{
    public function create(): AccountInterface;
    public function address(): string;
    public function mint(int $amount): CoinInterface;
}