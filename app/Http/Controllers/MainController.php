<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('main')->with([
            'addresses' => Address::all(),
            'customers' => Customer::all(),
            'customers_active' => Customer::whereDay('date', '>=', now()->format('d') - 3)->get(),
            'customers_passive' => Customer::whereBetween('date', [Carbon::now()->subDays(8), Carbon::now()->subDays(4)])->get(),
            'customers_noactive' => Customer::whereDay('date', '<', now()->format('d') - 7)->get(),
        ]);
    }
}
