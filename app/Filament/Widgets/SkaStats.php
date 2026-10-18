<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SkaStats extends StatsOverviewWidget
{
    protected ?string $heading = 'Ringkasan Konten Website';

    protected function getStats(): array
    {
        return [
            Stat::make('Produk & Layanan', Product::count())
                ->description(Product::where('is_published', true)->count() . ' tampil di website')
                ->descriptionIcon('heroicon-m-eye')
                ->color('primary'),

            Stat::make('Artikel', Article::count())
                ->description(Article::where('is_published', true)->count() . ' tampil di website')
                ->descriptionIcon('heroicon-m-eye')
                ->color('primary'),

            Stat::make('Galeri', Gallery::count())
                ->description(Gallery::where('is_published', true)->count() . ' tampil di website')
                ->descriptionIcon('heroicon-m-eye')
                ->color('primary'),

            Stat::make('Pesan Masuk', ContactMessage::count())
                ->description(ContactMessage::whereDate('created_at', today())->count() . ' pesan hari ini')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('success'),
        ];
    }
}