<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_admin:admin');        
    }

    public function index()
    {
        return view('roles.index')->with([
            'roles' => Role::paginate(10),
        ]); 
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(StoreRoleRequest $request)
    {
        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('success', "Rol muvaffaqiyatli yaratildi!");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Role $role)
    {
        return view('roles.edit')->with([
            'role' => $role,
        ]);
    }

    public function update(StoreRoleRequest $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('success', "O'zgarishlar muvaffaqiyatli saqlandi!");
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', "Rol o'chirildi!");
    }
}
