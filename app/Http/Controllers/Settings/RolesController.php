<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    public function index()
    {
        $data = Roles::get();
        return view('roles', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_role' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $roleData = [
            'name_role' => $request->name_role,
        ];

        Roles::create($roleData);

        return redirect()->route('roles')->with('success', 'Roles with the name ' . $request->name_role . ' has been added');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_role' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['name_role'] = $request->name_role;

        Roles::where('id', $id)->update($data);

        return redirect()->route('roles')->with('success', 'Roles with the name ' . $request->name_role . ' has been updated');
    }

    public function destroy(Roles $role, $id)
    {
        // Temukan pengguna
        $data = Roles::find($id);

        if ($data) {
            // Hapus entitas pengguna dari database
            $data->delete();

            return redirect()->route('roles')->with('success', 'Has been deleted');
        }

        return redirect()->route('roles')->with('failed', 'Role not found');
    }
}
