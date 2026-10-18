<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'short_description',
        'description',
        'image',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Product $product) {
            if (blank($product->slug) || trim($product->slug) === '-') {
                $baseSlug = Str::slug($product->name);

                if ($baseSlug === '') {
                    $baseSlug = 'produk';
                }

                $slug = $baseSlug;
                $counter = 2;

                while (
                    static::where('slug', $slug)
                        ->when(
                            $product->exists,
                            fn ($query) => $query->where(
                                $product->getKeyName(),
                                '!=',
                                $product->getKey()
                            )
                        )
                        ->exists()
                ) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                $product->slug = $slug;
            }
        });
    }
}