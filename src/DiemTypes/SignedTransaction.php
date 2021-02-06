<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;

/**
 * Class SignedTransaction
 * @package Softwarewisdom\Diem\DiemTypes
 */
class SignedTransaction
{
    /**
     * @var RawTransaction
     */
    public RawTransaction $rawTransaction;
    /**
     * @var TransactionAuthenticator
     */
    public TransactionAuthenticator $authenticator;

    /**
     * @return array{
     *     'RawTxn': array<mixed>,
     *     'Authenticator': string
     * }
     * ***/
    public function toArray(): array
    {
        return [
            'RawTxn' => $this->rawTransaction->toArray(),
            'Authenticator' => '0XC000088050'
        ];
    }
}
