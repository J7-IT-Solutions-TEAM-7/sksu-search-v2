<?php

namespace App\Http\Livewire\Mydashboard;

use App\Http\Livewire\MyDashboard\TravelOrderPrint;
use App\Models\Travel_Order;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class TravelOrders extends Component implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder 
    {
        return Travel_Order::query();
    } 

    protected function getTableColumns(): array 
    {
        return [
            Tables\Columns\TextColumn::make('tracking_code'),
            Tables\Columns\TextColumn::make('purpose'),
            Tables\Columns\TextColumn::make('date_range'),
        ];
    }

    protected function getTableFilters(): array
    {
        return [ ];
    }

    protected function getTableActions(): array
    {
        return [  
        Tables\Actions\ViewAction::make()
        ->label('View')
        ->color('success')
        ->url((route('print-travel-order', ['id' => $this->id]))), 
        ];
    }

    

    public function render(): View
    {
        return view('livewire.mydashboard.travel-orders');
    }
}
