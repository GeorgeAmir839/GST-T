<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make("User Information")
            ->columns(2)
            ->collapsible()
            ->compact()
            ->schema([
                Hidden::make("name"),
                TextInput::make("first_name")->live()->afterStateUpdated(fn (Set $set,Get $get, ?string $state) => $set('name', $state.' '.$get('last_name')))->required(),
                TextInput::make("last_name")->live()->afterStateUpdated(fn (Set $set,Get $get, ?string $state) => $set('name', $get('first_name').' '.$state))->required(),
                TextInput::make("email")
                    ->email()->required(),
                TextInput::make("phone_number")->required(),
                DatePicker::make('birth_date')->required(),
                TextInput::make('password')->minLength(6)
                            ->dehydrateStateUsing(static fn (null|string $state): null|string => filled($state) ? Hash::make($state) : null,)
                            ->password()
                            ->required(static fn (Page $livewire): string => $livewire instanceof CreateUser,)
                            ->dehydrated(static fn (null|string $state): bool => filled($state))
                            ->label(static fn (Page $livewire): string => ($livewire instanceof EditUser) ? 'New Password' : 'Password'),
                Toggle::make("banned")
                ->default(false)->columnSpanFull(),
            ]),
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('birth_date'),
                ToggleColumn::make('banned')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
