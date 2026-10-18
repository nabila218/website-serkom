<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'image',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Article $article) {
            if (blank($article->slug) || trim($article->slug) === '-') {
                $baseSlug = Str::slug($article->title);

                if ($baseSlug === '') {
                    $baseSlug = 'artikel';
                }

                $slug = $baseSlug;
                $counter = 2;

                while (
                    static::where('slug', $slug)
                        ->when(
                            $article->exists,
                            fn ($query) => $query->where(
                                $article->getKeyName(),
                                '!=',
                                $article->getKey()
                            )
                        )
                        ->exists()
                ) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                }

                $article->slug = $slug;
            }
        });
    }
}