<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfficeResource\Pages;
use App\Filament\Resources\OfficeResource\RelationManagers;
use App\Models\Campus;
use App\Models\Office;
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
use App\Models\Employee_information;
use Filament\Forms\Components\Grid;

class OfficeResource extends Resource 
{
    protected static ?string $model = Office::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Assignments';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('office_name')->required(),
                TextInput::make('office_code')->label(__('Code'))->minLength(7)->maxLength(8)->required(),
                Select::make('campus_id')
                ->label('Campus')
                ->options(Campus::all()->pluck('name', 'id'))
                ->searchable()->required(),
                Select::make('head_id')
                ->label('Head')
                ->options(Employee_information::all()->pluck('full_name', 'id'))
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
                TextColumn::make('office_name')->searchable()->sortable(),
                TextColumn::make('office_code')->searchable()->sortable(),
                TextColumn::make('campus.name')->searchable()->sortable(),
                TextColumn::make('head.full_name')->default('Not Added')->searchable()->sortable(),
                // TextColumn::make('admin.full_name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->color('success'),
            ])
            ->bulkActions([
               // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOffices::route('/'),
            'create' => Pages\CreateOffice::route('/create'),
            'edit' => Pages\EditOffice::route('/{record}/edit'),
        ];
    }    
}
