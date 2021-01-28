<?php

namespace Softwarewisdom\Diem;

interface MintInterface
{
    public function mint(): CoinInterface;
}
