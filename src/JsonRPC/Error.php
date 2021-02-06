<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\JsonRPC;

class Error
{
    public string $jsonrpc;
    public ErrorCode $code;
    public ?int $id;
}
