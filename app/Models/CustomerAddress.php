<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'street', 'city', 'state', 'postal_code', 'country'])]
class CustomerAddress extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
