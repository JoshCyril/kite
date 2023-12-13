<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteResource\Pages;
use App\Filament\Resources\QuoteResource\RelationManagers;
use App\Models\Quote;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Illuminate\Support\Str;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Quote')
                ->description('What is in your mind?')
                ->icon('heroicon-m-chat-bubble-left')
                ->schema([
                    TextInput::make('content')
                    ->live()
                    ->afterStateUpdated(function(string $operation, $state, Forms\Set $set){
                        if($operation === 'edit'){
                            return;
                        }

                        $set('slug', Str::slug($state));
                    })
                    ->required()->minLength(1)->maxLength (124),

                    Select::make('user_id')
                        ->label('Author')
                        ->relationship('user', 'name')
                        ->searchable(),

                    RichEditor::make('explanation')->required()->fileAttachmentsDirectory('quotes/images'),
                    FileUpload::make('cover_image')->image()->directory('quotes/covers'),
                ])->columns(2),
                Section::make('Extras')->schema([
                    Checkbox::make('featured'),
                    TextInput::make('slug')->required()->unique(ignoreRecord:true)->minLength(1)->maxLength (124),
                    DateTimePicker::make('quoted_at')->nullable(),
                ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image'),
                TextColumn::make('content')->sortable()->searchable(),
                TextColumn::make('explanation')->sortable()->searchable(),
                TextColumn::make('userDetail.user_name')->label('Author')->sortable()->searchable(),
                CheckboxColumn::make('featured')->sortable()->searchable(),
                TextColumn::make('quoted_at')->date('Y-m-d')->sortable()->searchable()

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListQuotes::route('/'),
            'create' => Pages\CreateQuote::route('/create'),
            'edit' => Pages\EditQuote::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}