<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserAccountResource\Pages;
use App\Filament\Resources\UserAccountResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Employee_information;
use Illuminate\Support\Facades\Hash;

class UserAccountResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Accounts';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Employees';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')->required(),
                TextInput::make('password')
            ->password()
            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
            ->dehydrated(fn ($state) => filled($state))
            ->required(fn (string $context): bool => $context === 'create'),
                Select::make('name')
                ->label('Employee')
                ->options(Employee_information::where('user_id', null)->pluck('full_name', 'id'))
                ->helperText('Employees without an account are shown here')
                ->searchable()->required(),
            ]);
    }

    protected static function getNavigationBadge(): ?string
    {
    return static::getModel()::count();
    }

    protected static function getNavigationBadgeColor(): ?string
    {
    return 'success';
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('name')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Edit email')
                ->color('success'),
            ])
            ->bulkActions([
                // /Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUserAccounts::route('/'),
            'create' => Pages\CreateUserAccount::route('/create'),
            'edit' => Pages\EditUserAccount::route('/{record}/edit'),
        ];
    }    
}
