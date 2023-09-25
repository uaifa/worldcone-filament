<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make('Product Information')->schema([
                    FileUpload::make('product_image_path')->required()->label('Product Image'),
                    TextInput::make('title')->required()->label('Product Title'),
                    TextInput::make('list_name')->required()->label('List Name'),
                    Textarea::make('description')->required()->label('Product Description'),
                    TextInput::make('price')->required()->numeric()->prefix('€')->maxValue(42949672.95),
                    Select::make('status')->label('Product Status')->options(['1' => 'Disabled','2' => 'Enabled','3' => 'Archived',]),
                    Select::make('attending_status')->label('Participation Type')->options(['1' => 'Not_attending',
                    '2' =>  'In_person',
                    '3' => 'Virtual',
                    '4' => 'Programme',
                    '5' => 'Finalist',
                    '6' => 'Volunteers'])->required(),
                    Select::make('required_wsfs_status')->label('Required WSFS Status')->options([ '1' => 'Vote_and_nominate',
                    '2' => 'Nominate',
                    '3' => 'None',
                    '4' => 'NASFiC'])->required(),
                    TextInput::make('age_at_con_min')->required()->label('Age at Convention (Min)'),
                    TextInput::make('age_at_con_max')->required()->label('Age at Convention (Max)'),
                    Select::make('is_public')->label('Is Public')->options([ '1' => 'Public','0' => 'Hidden'])->required(),
                    DatePicker::make('available_from')->required()->label('Available from'),
                    DatePicker::make('available_to')->required()->label('Available to'),
                ])->columns(2),
                
                Card::make('Requirements')->schema([
                    Select::make('requires_fullname')->label('Fullname')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_preferred_name')->label('Preferred Name')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_badge')->label('Badge')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_listing')->label('Listing')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_dob')->label('Date of Birth')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_employment')->label('Employment Status')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_email')->label('Email')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_email_alternate')->label('Alternative Email')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_guardian_details')->label('Guardian Details')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_street')->label('Street')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_city')->label('City')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_state')->label('State')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('requires_country')->label('Country')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                ])->columns(2),
                Card::make('Requests')->description('Toggle for requesting certain flags against the participation subscription')->schema([
                    Select::make('request_pr')->label('Request PR')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_souvenir')->label('Request Souvenir')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_minimal')->label('Request Minimal Contact')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_pass_along')->label('Request Pass Details')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_access')->label('Request Access')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_program')->label('Request Programme')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_dealers')->label('Request Dealers Table')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_fan_table')->label('Request Fan Table')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_exhibitor')->label('Request Exhibitor')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_performer')->label('Request Performer')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_art_show')->label('Request Art Show')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_volunteer')->label('Request Volunteer')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_instalment')->label('Request Instalment')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),
                    Select::make('request_child_care')->label('Request Child Care')->options(['1' => 'Hidden','2' => 'Optional','3' => 'Required'])->required(),

                ])->columns(2)

                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->numeric()->sortable()->label('ID')->searchable(),
                // TextColumn::make('product_image_path')->sortable()->label('Product Image')->searchable(),
                // TextColumn::make('title')->sortable()->label('Product Title')->searchable(),
                // TextColumn::make('list_name')->sortable()->label('List Name')->searchable(),
                // Textarea::make('description')->sortable()->label('Product Description')->searchable(),
                // TextColumn::make('price')->sortable()->label('Price')->searchable(),
                // Select::make('status')->label('Product Status')->options(['1' => 'Disabled','2' => 'Enabled','3' => 'Archived',]),
                // Select::make('attending_status')->label('Participation Type')->options(['1' => 'Not_attending',
                // '2' =>  'In_person',
                // '3' => 'Virtual',
                // '4' => 'Programme',
                // '5' => 'Finalist',
                // '6' => 'Volunteers']),
                // Select::make('required_wsfs_status')->label('Required WSFS Status')->options([ '1' => 'Vote_and_nominate',
                // '2' => 'Nominate',
                // '3' => 'None',
                // '4' => 'NASFiC']),
                // TextColumn::make('age_at_con_min')->sortable()->label('Age at Convention (Min)')->searchable(),
                // TextColumn::make('age_at_con_max')->sortable()->label('Age at Convention (Max)')->searchable(),
                // Select::make('is_public')->label('Is Public')->options([ '1' => 'Public','0' => 'Hidden']),
                // DatePicker::make('available_from')->sortable()->label('Available from')->searchable(),
                // DatePicker::make('available_to')->sortable()->label('Available to')->searchable(),

                TextColumn::make('status')->sortable()->label('Status')->searchable(),
                TextColumn::make('price')->sortable()->label('Price')->searchable(),
                TextColumn::make('available_from')->sortable()->label('Availablity')->searchable(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
