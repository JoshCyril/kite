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
use Filament\Forms\Components\Hidden;
use Filament\Forms\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('What is in your mind?')
                ->description('Anything new, you want to share?')
                ->icon('heroicon-m-chat-bubble-left')
                ->schema([
                    TextInput::make('content')
                    ->label('Quote')
                        ->live()
                        ->afterStateUpdated(function(string $operation, $state, Forms\Set $set){
                            if($operation === 'edit'){
                                return;
                            }

                            $set('slug', Str::slug($state));
                        })
                        ->required()->minLength(1)->maxLength (124)
                        ->columnSpanFull(),

                    TextInput::make('author')->default('unknown')->required(),

                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->required()->default(auth()->id()),

                    Select::make('categories')
                        ->multiple()
                        ->relationship('categories', 'name')
                        ->searchable(),

                    RichEditor::make('explanation')->required()->fileAttachmentsDirectory('quotes/images'),
                    FileUpload::make('cover_image')->image()->directory('quotes/covers'),
                ])->columns(2),

                Section::make('Extras')->schema([

                    Checkbox::make('featured'),
                    TextInput::make('slug')->required()->minLength(1)->unique(ignoreRecord:true)->maxLength (124),
                    DateTimePicker::make('quoted_at')->nullable()->default(
                        now()
                    ),

                    // Hidden::make('user_id')->default(auth()->id())

                    // CreateAction::make()
                    //     ->mutateFormDataUsing(function (array $data): array {
                    //         $data['user_id'] = auth()->id();

                    // Forms\Components\Select::make('user_id')
                    //         ->options(function (RelationManager $livewire): array {
                    //             return $livewire->ownerRecord->stores()
                    //                 ->pluck('name', 'id')
                    //                 ->toArray();



                ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->sortable()->searchable(),
                CheckboxColumn::make('featured')->sortable()->searchable(),
                ImageColumn::make('cover_image'),
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
            // $this->event->name
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