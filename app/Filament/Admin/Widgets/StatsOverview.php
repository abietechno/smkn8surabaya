<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Artikel', Post::count())
                ->description('Jumlah artikel yang dibuat')
                ->icon('heroicon-o-document-text')
                ->color('primary'),
            Stat::make('Total Halaman', Page::count())
                ->description('Jumlah halaman statis')
                ->icon('heroicon-o-rectangle-stack')
                ->color('success'),
            Stat::make('Total User', User::count())
                ->description('Jumlah pengguna terdaftar')
                ->icon('heroicon-o-users')
                ->color('warning'),
        ];
    }
}
