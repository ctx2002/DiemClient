<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;

class SignedTransaction
{
    public RawTransaction $rawTransaction;
    public TransactionAuthenticator $authenticator;

    /**
     * @return array {'RawTxn': array<mixed>, 'Authenticator': string}
     * ***/
    public function toArray(): array
    {
        return [
            'RawTxn' => $this->rawTransaction->toArray(),
            'Authenticator' => '0XC000088050'
        ];
    }
}
