<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul artikel')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                TextInput::make('slug')
                    ->label('Slug (alamat unik)')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('category')
                    ->label('Kategori')
                    ->maxLength(100),

                DateTimePicker::make('published_at')
                    ->label('Tanggal terbit')
                    ->default(now()),

                Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->rows(2)
                    ->maxLength(255)
                    ->columnSpanFull(),

                Textarea::make('content')
                    ->label('Isi artikel')
                    ->rows(8)
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('articles')
                    ->visibility('public')
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Tampilkan di website')
                    ->default(true),
            ]);
    }
}