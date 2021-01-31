<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;


class StructTag
{
    public AccountAddress $accountAddress;
    public string $module;
    public string $name;

    /**
     * @var array<mixed>
     * **/
    public array $typeParams = [];
}