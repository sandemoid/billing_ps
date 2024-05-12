<?php

use App\Models\Pengaturan;
use Carbon\Carbon;

// Periksa apakah fungsi 'pengaturan' sudah ada
if (!function_exists('pengaturan')) {
    /**
     * Mendapatkan nilai pengaturan dari cache atau database.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function pengaturan($key, $default = null)
    {
        // Ambil data pengaturan dari cache atau database
        return cached_pengaturan($key, $default);
    }
}

/**
 * Mendapatkan nilai pengaturan dari cache atau database.
 *
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
function cached_pengaturan($key, $default = null)
{
    // Ambil data pengaturan dari cache
    $pengaturan = cache()->get('pengaturan_' . $key);

    // Jika tidak ada data di cache, ambil dari database dan simpan ke cache
    if (!$pengaturan) {
        $pengaturan = fetch_pengaturan_from_database($key);
        cache()->put('pengaturan_' . $key, $pengaturan, config('cache.duration'));
    }

    // Kembalikan nilai pengaturan atau default jika tidak ditemukan
    return $pengaturan ? $pengaturan->value : $default;
}

/**
 * Mengambil data pengaturan dari database.
 *
 * @param  string  $key
 * @return mixed
 */
function fetch_pengaturan_from_database($key)
{
    return Pengaturan::where('key', $key)->first();
}

function waktu_jadwal($date)
{
    // Set locale untuk format waktu bahasa Indonesia
    setlocale(LC_TIME, 'id_ID');

    // Parse tanggal menggunakan Carbon
    $converted = Carbon::parse($date);

    // Format tanggal sesuai dengan 'Y-m-d'
    return $converted->toDateString();
}
