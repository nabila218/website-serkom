<?php

namespace App\Filament\Resources\CompanyProfiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CompanyProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->label('Nama perusahaan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('tagline')
                    ->label('Tagline')
                    ->maxLength(255),

                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->disk('public')
                    ->directory('company')
                    ->visibility('public')
                    ->columnSpanFull(),

                Textarea::make('about')
                    ->label('Tentang perusahaan')
                    ->rows(5)
                    ->columnSpanFull(),

                Textarea::make('vision')
                    ->label('Visi')
                    ->rows(3)
                    ->columnSpanFull(),

                Textarea::make('mission')
                    ->label('Misi (satu misi per baris)')
                    ->rows(6)
                    ->columnSpanFull(),

                Textarea::make('address')
                    ->label('Alamat')
                    ->rows(2)
                    ->columnSpanFull(),

                TextInput::make('phone')
                    ->label('Telepon')
                    ->tel()
                    ->maxLength(30),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(255),

                TextInput::make('website')
                    ->label('Website')
                    ->url()
                    ->maxLength(255),
            ]);
    }
}