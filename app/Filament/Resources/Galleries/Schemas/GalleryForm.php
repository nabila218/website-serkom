<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul kegiatan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('category')
                    ->label('Kategori')
                    ->maxLength(100),

                DatePicker::make('activity_date')
                    ->label('Tanggal kegiatan'),

                Textarea::make('description')
                    ->label('Keterangan gambar')
                    ->rows(3)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('galleries')
                    ->visibility('public')
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Tampilkan di website')
                    ->default(true),
            ]);
    }
}