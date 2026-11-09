<?php

namespace App\Filament\Widgets;

use App\Models\Aspirasi;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Menunggu', Aspirasi::where('status', 'Menunggu')->count()),
            Stat::make('Proses', Aspirasi::where('status', 'Proses')->count()),
            Stat::make('Selesai', Aspirasi::where('status', 'Selesai')->count()),
        ];
    }
}
