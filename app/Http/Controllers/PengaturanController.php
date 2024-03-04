<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => Pengaturan::where('key', 'title')->first(),
        ];
        return view('pengaturan', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaturan $pengaturan)
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
