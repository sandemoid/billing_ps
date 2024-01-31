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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data  = User::get();
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data = User::find($id);
        return view('user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'old_password' => $request->filled('old_password') ? 'required' : '',
            'new_password' => $request->filled('old_password') ? 'required' : '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['email'] = $request->email;
        $data['name'] = $request->name;

        // Periksa apakah old_password diisi
        if ($request->filled('old_password')) {
            // Pastikan old_password sesuai sebelum mengganti password
            if (!Hash::check($request->old_password, auth()->user()->password)) {
                return redirect()->back()->with('error', 'Old password is incorrect');
            }

            // Ganti password hanya jika old_password sesuai dan new_password diisi
            if ($request->filled('new_password')) {
                $data['password'] = Hash::make($request->new_password);
            } else {
                return redirect()->back()->with('error', 'New password is required when changing the old password');
            }
        }

        User::where('id', $id)->update($data);

        return redirect()->route('user')->with('success', 'User with the name ' . $request->name . ' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        // Temukan pengguna
        $data = User::find($id);

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

        return redirect()->route('user')->with('error', 'User not found');
    }
}
