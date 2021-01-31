<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;


class AccessPath
{
    public AccountAddress $accountAddress;
    /**
     * @var array<int>
     * ***/
    public array $path;
}