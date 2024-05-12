<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data  = User::get();
        return view('user.user', compact('data'));
    }

    public function create()
    {
        $roles = Roles::all();
        return view('user.add', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:4',
            'role_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $imageFile = $request->file('image');
        $imageName = time() . '.' . $request->image->extension();
        $path = $imageFile->storeAs('profile', $imageName, 'public');

        $userData = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'image' => $imageName,
        ];

        User::create($userData);

        return redirect()->route('user')->with('success', 'User with the name ' . $request->name . ' has been added');
    }

    public function edit(Request $request, $id)
    {
        $data = User::find($id);
        $roles = Roles::all();
        return view('user.edit', compact('data', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'old_password' => $request->filled('old_password') ? 'required' : '',
            'new_password' => $request->filled('old_password') ? 'required' : '',
            'role_id' => 'nullable|exists:roles,id_roles',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['email'] = $request->email;
        $data['name'] = $request->name;

        if ($request->filled('role_id')) {
            $roleExists = Roles::where('id_roles', $request->role_id)->exists();
            if (!$roleExists) {
                return redirect()->back()->with('failed', 'Invalid role selected');
            }

            $data['role_id'] = $request->role_id;
        }

        if ($request->filled('old_password')) {
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return redirect()->back()->with('failed', 'Old password is incorrect');
            }

            $data['password'] = Hash::make($request->new_password);
        }

        User::where('id', $id)->update($data);

        return redirect()->route('user')->with('success', 'User with the name ' . $request->name . ' has been updated');
    }

    public function destroy(User $user, $id)
    {
        // Temukan pengguna
        $data = User::findOrFail($id);

        if ($data) {
            // Hapus foto sebelum menghapus pengguna
            $imagePath = "public/profile/{$data->image}";

            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }

            // Hapus entitas pengguna dari database
            $data->delete();

            return redirect()->route('user')->with('success', 'Has been deleted');
        }
        return redirect()->route('user')->with('failed', 'User not found');
    }
}
