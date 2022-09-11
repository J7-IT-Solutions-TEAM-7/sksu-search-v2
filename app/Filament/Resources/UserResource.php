<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Employee_information;
use App\Models\User;
use App\Models\Campus;
use App\Models\Office;
use App\Models\Position;
use App\Models\Role;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;

class UserResource extends Resource
{
    protected static ?string $model = Employee_information::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Information';

    protected static ?int $navigationSort = 6;

    // protected static ?string $navigationColor = 'green';

    protected static ?string $navigationGroup = 'Employees';

    public static function form(Form $form): Form
    {
        return $form
        
            ->schema([
                Fieldset::make('Name')
                ->schema([
                    TextInput::make('first_name')->required(),
                    TextInput::make('last_name')->required(),
                    TextInput::make('full_name')->required(),
                    TextInput::make('address'),
                 ])->columns(2),
                 Fieldset::make('Assignment')
                ->schema([
                    Select::make('role_id')
                    ->label('Role')
                    ->options(Role::all()->pluck('role_desc', 'id'))
                    ->searchable()->required(),
                    Select::make('office_id')
                    ->label('Office')
                    ->options(Office::all()->pluck('office_name', 'id'))
                    ->searchable()->required(),
                    Select::make('position_id')
                    ->label('Position')
                    ->options(Position::all()->pluck('position_desc', 'id'))
                    ->searchable()->required(),
                 ])->columns(2)
                
               
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
                TextColumn::make('full_name')->searchable(['first_name', 'last_name'])->sortable(),
                TextColumn::make('position.position_desc')->searchable()->sortable(),
                TextColumn::make('office.office_name')->searchable()->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->color('success'),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
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
