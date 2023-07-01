<?php

namespace FilamentSound\FilamentSound\Resources;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\IconColumn;
use FilamentSound\FilamentSound\Resources\SoundResource\Pages;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use FilamentSound\FilamentSound\Models\Sound;

class SoundResource extends Resource
{
    protected static ?string $model = Sound::class;

    protected static ?string $navigationIcon = 'heroicon-s-cog';
    
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Card::make()
            ->schema([
                    TextInput::make('model')
                    ->label('Name')
                    ->disabled()
                    ->columnSpan([
                        'md' => 6,
                    ]),
                    Select::make('status')
                    ->label('status')
                    ->options([
                        '1' => 'Enable',
                        '0' => 'Disable',
                    ])
                    ->columnSpan([
                        'md' => 6,
                    ]),
                    Checkbox::make('created')
                    ->label('Created')
                    ->columnSpan([
                        'md' => 6,
                    ]),
                    Checkbox::make('updated')
                    ->label('Updated')
                    ->columnSpan([
                        'md' => 6,
                    ]),
                    Checkbox::make('deleted')
                    ->label('Deleted')
                    ->columnSpan([
                        'md' => 6,
                    ]),
                    Checkbox::make('restored')
                    ->label('Restored')
                    ->columnSpan([
                        'md' => 6,
                    ]),
                ])
                ->columns([
                'md' => 12
            ])
            ->columnSpan('full'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('model')->label('Name')->icon('heroicon-o-document-text')->sortable()->searchable(),
                IconColumn::make('status')
                ->label('Status')->boolean()
                ->trueIcon('heroicon-o-badge-check')
                ->falseIcon('heroicon-o-x-circle'),
                IconColumn::make('created')
                ->label('Created')->boolean()
                ->trueIcon('heroicon-o-badge-check')
                ->falseIcon('heroicon-o-x-circle'),
                IconColumn::make('updated')
                ->label('Updated')->boolean()
                ->trueIcon('heroicon-o-badge-check')
                ->falseIcon('heroicon-o-x-circle'),
                IconColumn::make('deleted')
                ->label('Deleted')->boolean()
                ->trueIcon('heroicon-o-badge-check')
                ->falseIcon('heroicon-o-x-circle'),
                IconColumn::make('restored')
                ->label('Restored')->boolean()
                ->trueIcon('heroicon-o-badge-check')
                ->falseIcon('heroicon-o-x-circle'),
                TextColumn::make('created_at')->label('Created At'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function canCreate(): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSounds::route('/'),
            'edit' => Pages\EditSound::route('/{record}/edit'),
        ];
    }    
}
