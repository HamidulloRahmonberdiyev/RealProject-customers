<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        return view('customers.index')->with([
            'customers' => Customer::latest('date')->paginate(10),
            'addresses' => Address::all(),
        ]);
    }

    public function create()
    {
        return view('customers.create')->with([
            'addresses' => Address::all(),
        ]);
    }

    public function store(StoreCustomerRequest $request)
    {
        Customer::create([
            'address_id' => $request->address_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'returned' => $request->returned,
            'date' => $request->date,
        ]);

        return redirect()->route('customers.index')->with('success', "Mijoz muvaffaqiyatli qo'shildi!");
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit')->with([
            'customer' => $customer,
            'addresses' => Address::all(),
        ]);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update([
            'address_id' => $request->address_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'returned' => $request->returned,
            'date' => $request->date,
        ]);

        return redirect()->route('customers.index')->with('success', "O'zgarishlar saqlandi!");
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->back()->with('success', "Mijoz o'chirildi!");
    }
}
