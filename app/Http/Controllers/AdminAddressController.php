<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AdminAddressController extends Controller
{
    public function index()
    {
        return view('addresses.index')->with([
            'addresses' => Address::paginate(10),
        ]);
    }

    public function create()
    {
        return view('addresses.create');
    }

    public function store(StoreAddressRequest $request)
    {
        Address::create([
            'name' => $request->name,
        ]);

        return redirect()->route('addresses.index')->with('success', "Manzil muvaffaqiyatli qo'shildi!");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Address $address)
    {
        return view('addresses.edit')->with([
            'address' => $address,
        ]);
    }

    public function update(StoreAddressRequest $request, Address $address)
    {
        $address->update([
            'name' => $request->name,
        ]);

        return redirect()->route('addresses.index')->with('success', "O'zgarishlar saqlandi!");
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('addresses.index')->with('success', "Manzil o'chirildi!");
    }
}
