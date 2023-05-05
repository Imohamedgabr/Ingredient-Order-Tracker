<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductOrder extends Pivot
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
