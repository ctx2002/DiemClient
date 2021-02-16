<?php

declare(strict_types=1);

namespace Softwarewisdom\Diem\DiemTypes;

use Symfony\Component\Serializer\Annotation\SerializedName;

class CurrencyInfo
{
    /**
     * @SerializedName("fractional_part")
     * ***/
    public int $fractional_part;    //unsigned int64    Max fractional part of single unit of currency allowed in a transaction
    public int $scaling_factor;//   unsigned int64  Factor by which the amount is scaled before it is stored in the blockchain
    public float $to_xdx_exchange_rate;//     float32     Exchange rate of the currency to XDX currency
    public string $mint_events_key;    //string    Unique key for the mint events stream of this currency
    public string $burn_events_key;    //string    Unique key for the burn events stream of this currency
    public string $preburn_events_key;     //string    Unique key for the preburn events stream of this currency
    public string $cancel_burn_events_key; //  string  Unique key for the cancel burn events stream of this currency
    public string $exchange_rate_update_events_key; //     string  Unique key for the exchange rate update events stream of this currency
}
