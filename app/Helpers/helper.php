<?php

use App\Models\Pengaturan;

if (!function_exists('pengaturan')) {
    function pengaturan($key, $default = null)
    {
        // Ambil data pengaturan dari database berdasarkan kunci
        $pengaturan = cache()->remember('pengaturan_' . $key, env('CACHE_DURATION'), function () use ($key) {
            return Pengaturan::where('key', $key)->first();
        });

        // Kembalikan nilai pengaturan atau default jika tidak ditemukan
        return $pengaturan ? $pengaturan->value : $default;
    }
}
