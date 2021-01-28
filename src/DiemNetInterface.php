<?php

namespace Softwarewisdom\Diem;

interface DiemNetInterface
{
    public function account(): AccountInterface;
    public function mint(AccountInterface $account): CoinInterface;
}
