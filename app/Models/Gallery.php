<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'activity_date',
        'category',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'activity_date' => 'date',
            'is_published' => 'boolean',
        ];
    }
}