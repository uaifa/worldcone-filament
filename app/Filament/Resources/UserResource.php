<?php

namespace App\Filament\Resources;

use App\Enum\UserRole;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users'; //'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make('User Information')->schema([
                    TextInput::make('username')->required()->unique(ignoreRecord:true)->maxLength(255)->live(debounce: '1000')->afterStateUpdated(fn (Set $set, ?string $state) => $set('name', $state)),
                    Hidden::make('name')->required(),
                    TextInput::make('email')->email()->unique(ignoreRecord:true)->required()->maxLength(255),
                    DateTimePicker::make('email_verified_at'),
                    TextInput::make('password')->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (Page $livewire) => ($livewire instanceof CreateUser))
                    ->maxLength(255),
                    Select::make('roles')->multiple()->relationship('roles', 'name')->preload(),
                    Select::make('permissions')->multiple()->relationship('permissions', 'name')->preload(),
                    
                    // Select::make('userId')->options(function () {return UserRole::toValueKeyArray(); })->required()
                ])->columns(2)
                
            ]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->numeric()->sortable()->label('ID')->searchable(),
                TextColumn::make('username')->sortable()->label('Username')->searchable(),
                TextColumn::make('email')->sortable()->label('Email')->searchable(),
                TextColumn::make('role')->sortable()->label('Role')->searchable()->formatStateUsing(fn (string $state): string => userRoles($state)),
                TextColumn::make('email_verified_at')->dateTime(),
                TextColumn::make('created_at')->dateTime(),
                
             
                
            ])
            ->defaultSort('users.id', 'DESC')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public function getTableBulkActions()
{
        return  [
            \ExportBulkAction::make()
        ];
    }
}
