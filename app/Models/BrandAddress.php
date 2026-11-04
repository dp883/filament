<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['brand_id', 'street', 'city', 'state', 'postal_code', 'country'])]
class BrandAddress extends Model
{
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
