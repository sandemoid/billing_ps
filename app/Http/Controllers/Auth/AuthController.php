<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'credential' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->credential;
        $password = $request->password;

        // Lakukan pengecekan apakah credential adalah alamat email atau nomor WhatsApp
        $field = filter_var($credential, FILTER_VALIDATE_EMAIL) ? 'email' : 'nowa';

        $credentials = [
            $field => $credential,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            $user = User::where($field, $credential)->first();
            session(['role_id' => $user->role_id]); // Simpan role_id ke dalam session

            // Tambahkan cookie jika Auth berhasil
            $cookie = cookie('user_id', $user, 60 * 24 * 3);
            $redirectRoute = $user->role_id == 3 ? RouteServiceProvider::GAMERS : RouteServiceProvider::HOME;

            return redirect()->intended($redirectRoute)->withCookie($cookie)->with('success', 'Kamu berhasil login');
        }

        throw ValidationException::withMessages([
            'credential' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Kamu berhasil keluar sesi');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nowa' => ['required', 'regex:/^(?:\+\d{1,3}[- ]?)?\d{6,14}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nowa' => $request->nowa,
            'password' => bcrypt($request->password_confirmation),
            'role_id' => 3,
            'image' => 'default.jpg'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::GAMERS)->with('success', 'Kamu berhasil mendaftar');
    }
}
