<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetsitterAdvert extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'city',

        'picture',
        'advert_active',

        'house_pictures',
    ];

    protected $casts = [
        'advert_active' => 'boolean',
        'house_pictures' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
