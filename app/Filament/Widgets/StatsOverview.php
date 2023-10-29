<?php

namespace App\Filament\Widgets;

use App\Enums\EmployeeStatusEnum;
use App\Enums\ExcavatorStatusEnum;
use App\Models\Employee;
use App\Models\Excavator;
use App\Models\OperationalCost;
use App\Models\Sparepart;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
 
    protected static ?string $pollingInterval = '15s';

    protected static bool $slazy = true;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Sparepart', Sparepart::count())
                ->description('Increse in customers')
                // ->description('heroicon-m-arrow-ternding-up')
                ->color('success'),
                // ->chart([7,3,4,5,6,3,5,3]),
            Stat::make('Total Operational Cost', OperationalCost::count())
                ->description('Total Operational Cost in app')
                // ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('success'),
                // ->chart([3,4,5,6,3,5,3]),
            Stat::make('Total Excavator', Excavator::where('status', ExcavatorStatusEnum::AVAILABLE->value)->count())
                ->description('Total Excavator in app')
                // ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('success'),
                // ->chart([3,4,5,6,3,5,3]),
                Stat::make('Total Employee', Employee::where('employee_status', EmployeeStatusEnum::FULL_TIME->value)->count())
                ->description('Total Employee in app')
                // ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
                // ->chart([3,4,5,6,3,5,3]),
        ];
    }
}

// Stat::make(label:'Total Sparepart','Total Operational','Total Excavator','Total Employee')