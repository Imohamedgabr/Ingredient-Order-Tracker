<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class StoreOrderRequestData extends Data
{
    public function __construct(
        #[DataCollectionOf(ProductOrderData::class)]
        public DataCollection $products,
    ) {
    }
}
