<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = [
        'weather',
        'temp',
        'temp_min',
        'temp_max',
        'humidity',
        'pressure',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
