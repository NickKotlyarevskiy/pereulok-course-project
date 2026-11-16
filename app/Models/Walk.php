<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Walk extends Model
{
    protected $fillable = [
        'title', 'slug', 'district', 'teaser', 'description',
        'duration_minutes', 'distance_km', 'difficulty', 'start_point',
        'finish_point', 'accent', 'stops', 'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'stops' => 'array',
            'is_featured' => 'boolean',
            'distance_km' => 'decimal:1',
        ];
    }
}
