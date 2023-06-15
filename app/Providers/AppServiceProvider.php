<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        PaginationPaginator::useBootstrapFive();

        date_default_timezone_set('Asia/Tashkent');

        View()->composer('components.layout.main', function($view) {
            $view->with('customers', Customer::all());
            $view->with('customers_active', Customer::whereDay('date', '>=', Carbon::now()->format('d') - 3)->get());
            $view->with('customers_passive', Customer::whereBetween('date', [Carbon::now()->subDays(8), Carbon::now()->subDays(4)])->get());
            $view->with('customers_noactive', Customer::whereDay('date', '<', Carbon::now()->format('d') - 7)->get());
        });
    }
}
