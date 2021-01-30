<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;

class RawTransaction
{
    public AccountAddress $sender;
    public int $sequenceNumber;
    public TransactionPayload $payLoad;
    public int $maxGasAmount;
    public int $gasUnitPrice;
    public string $gasCurrencyCode;
    public string $expirationTimestampSecs;
    public int $chainId;
}
