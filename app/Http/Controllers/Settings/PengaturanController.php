<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Pengaturan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => Pengaturan::where('key', 'title')->first(),
        ];
        $data = Jadwal::all();
        return view('pengaturan', $data);
    }

    public function update_jadwal(Request $request): RedirectResponse
    {
        $data = [
            'hari' => $request->hari,
            'waktu_buka' => $request->waktu_buka,
            'waktu_tutup' => $request->waktu_tutup
        ];

        DB::table('jadwal_ps')->insert($data);

        return redirect()->back()->with('success', 'Berhasil update informasi aplikasi');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_app(Request $request, Pengaturan $pengaturan): RedirectResponse
    {
        foreach ($request->all() as $key => $value) {
            $value = $value ?: null;
            Pengaturan::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Pastikan file ada sebelum melakukan operasi upload
        if ($request->hasFile('logo_web')) {

            $old = Pengaturan::where('key', 'logo_web')->first();
            Storage::delete('public/logo/' . $old->favicon);
            $file = $request->file('logo_web');
            $imageName = date('dmY') . '.' . $file->getClientOriginalExtension();
            $request->file('logo_web')->storeAs('public/logo', $imageName);
            Pengaturan::updateOrCreate(['key' => 'logo_web'], ['value' => $imageName]);
        }
        return redirect()->back()->with('success', 'Berhasil update informasi aplikasi');
    }
}
