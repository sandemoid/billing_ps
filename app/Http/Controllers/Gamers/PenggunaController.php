<?php

namespace App\Http\Controllers\Gamers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        return view('gamers.pengguna.index', [
            'user' => $request->user()
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->file('image')->storeAs('public/profile', $filename);
            $user->image = $filename;
        }

        $user->save();

        return Redirect::route('pengguna.edit')->with('success', 'Pengguna updated successfully');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('password', [
            'password' => ['required']
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/logout')->with('success', 'User has ben deleted successfully');
    }
}
