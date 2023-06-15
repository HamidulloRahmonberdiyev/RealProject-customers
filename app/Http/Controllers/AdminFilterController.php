<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminFilterController extends Controller
{
    public function address_filter(Request $request)
    {
        $customers = Customer::where([
            [function ($query) use ($request) {
                if (($filter = $request->filter)) {
                    $query->orWhere('address_id', 'LIKE', '%' . $filter . '%')->get();
                }
            }]
        ])->latest('updated_at')->paginate(10);

        return view('customers.index')->with([
            'customers' => $customers,
            'addresses' => Address::all(),
        ]);
    }

    public function customers_active()
    {
        return view('customers.index')->with([
            'customers' => Customer::whereDay('date', '>=', Carbon::now()->format('d') - 3)->paginate(10),
            'addresses' => Address::all(),
        ]);
    }

    public function customers_passive()
    {
        return view('customers.index')->with([
            'customers' => Customer::whereBetween('date', [Carbon::now()->subDays(8), Carbon::now()->subDays(4)])->paginate(10),
            'addresses' => Address::all(),
        ]);
    }

    public function customers_noactive()
    {
        return view('customers.index')->with([
            'customers' => Customer::whereDay('date', '<', now()->format('d') - 7)->paginate(10),
            'addresses' => Address::all(),
        ]);
    }
}
