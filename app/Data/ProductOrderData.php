<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class ProductOrderData extends Data
{
    public function __construct(
        #[Rule('required|integer|exists:products,id')]
        public int $product_id,
        #[Rule('required|integer')]
        public int $quantity
    ) {
    }
}
