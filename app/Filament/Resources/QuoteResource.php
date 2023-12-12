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

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Content')->schema([
                    TextInput::make('content')
                    ->live()
                    ->afterStateUpdated(function(string $operation, $state, Forms\Set $set){
                        if($operation === 'edit'){
                            return;
                        }

                        $set('slug', Str::slug($state));
                    })
                    ->required()->minLength(1)->maxLength (124),
                    TextInput::make('slug')->required()->unique(ignoreRecord:true)->minLength(1)->maxLength (124),
                    TextInput::make('author')->required(),

                    RichEditor::make('explanation')->required()->fileAttachmentsDirectory('quotes/images')->columnSpanFull(),
                ])->COLUMN(2),
                Section::make('Meta')->schema([
                    FileUpload::make('image')->image()->directory('quotes/covers'),
                    DateTimePicker::make('quoted_at')->required()
                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('content')->sortable()->searchable(),
                TextColumn::make('explanation')->sortable()->searchable(),
                TextColumn::make('author')->sortable()->searchable(),
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
