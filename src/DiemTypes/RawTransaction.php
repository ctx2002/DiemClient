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

    public function __construct()
    {
        $this->sender = new AccountAddress();
    }

    /**
     * @return array{
     *     Sender: array<int, int>,
     *     SequenceNumber: int,
     *     Payload: string,
     *     MaxGasAmount: int,
     *     GasUnitPrice: int,
     *     GasCurrencyCode: string,
     *     ExpirationTimestampSecs: int,
     *     ChainId : int
     * }
     * **/
    public function toArray(): array
    {
        return [
            'Sender' => $this->sender->uint8->toArray(),
            'SequenceNumber' => 1,
            'Payload' => 'ox8745d4',
            'MaxGasAmount' => 1,
            'GasUnitPrice' => 1,
            'GasCurrencyCode' => 'XUD',
            'ExpirationTimestampSecs' => 1611620650,
            'ChainId' => 2
        ];
    }
}
