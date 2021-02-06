<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\JsonRPC;

use Symfony\Component\Serializer\Annotation\SerializedName;

class JsonRPCResponse
{
    public string $jsonrpc;
    /**
     * @var mixed
     * **/
    public $result;

    /**
     *
     * ***/
    public ?Error $error;

    public int $id;

    /**
     * @SerializedName("diem_chain_id")
     * ***/
    public int $diemChainId;

    /**
     * @SerializedName("diem_ledger_version")
     * **/
    public int $diemLedgerVersion;

    /**
     * @SerializedName("diem_ledger_timestampusec")
     * **/
    public int $diemLedgerTimestampusec;
}
