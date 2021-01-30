<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;

class SignedTransaction
{
    public RawTransaction $rawTransaction;
    public TransactionAuthenticator $authenticator;
}
