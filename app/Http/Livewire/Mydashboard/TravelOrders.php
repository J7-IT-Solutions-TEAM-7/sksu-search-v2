<?php

namespace App\Http\Livewire\Mydashboard;

use App\Http\Livewire\MyDashboard\TravelOrderPrint;
use App\Http\Livewire\TravelOrder;
use App\Models\Travel_Order;
use App\Models\Travel_Order_Applicant;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TravelOrders extends Component implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder 
    {
        $travel_order_ids = [];
        $id = Auth::user()->id;
        $applicants = Travel_Order_Applicant::query()->where('employee_id', $id)->get();
        foreach($applicants as $applicant)
        {
            $travel_order_ids[] =  $applicant->travel_order_id;
        }
        // return Travel_Order::query()->with('applicant');
        // $applicants = Travel_Order_Applicant::where
       // dd(Travel_Order::query()->whereIn('id', $travel_order_ids));
          return Travel_Order::query()->whereIn('id', $travel_order_ids);
    }

    protected function getTableColumns(): array 
    {
        return [
            Tables\Columns\TextColumn::make('tracking_code')->searchable(),
            Tables\Columns\TextColumn::make('purpose')->limit(30)->searchable(),
            Tables\Columns\TextColumn::make('date_range')->searchable(),
            Tables\Columns\BooleanColumn::make('isDraft')
            ->label('Draft')->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [  
        Tables\Actions\ViewAction::make()
        ->label('View')
        ->color('success')
        ->url(fn ($record) => route('print-travel-order', 'id='.$record->id)),
        //->url(fn (TravelOrder $travel_order): string => route('print-travel-order', ['id' => $travel_order->id])), 
        ];
    }

    

    public function render(): View
    {
        return view('livewire.mydashboard.travel-orders');
    }
}
