<?php

namespace Softwarewisdom\Diem\TestNet;

/**
 * @see, https://github.com/diem/diem/blob/master/client/faucet/README.md
 * * */
class MintParam
{
    /**
     * @var string
     */
    public $currencyCode = 'XUD';
    /**
     * @var string
     */
    public $authKey;
    /**
     * @var int
     */
    public $amount = 0;
    /**
     * @var string
     */
    public $returnTxns = 'false';//not yet implemented. i have to implement BCS encoding
}
