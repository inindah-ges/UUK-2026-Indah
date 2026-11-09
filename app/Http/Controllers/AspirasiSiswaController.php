<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AspirasiSiswaController extends Controller
{
    public function index(Request $request)
    {
        $kategoris = Kategori::all();
        $nis = $request->query('nis');
        $siswa = null;
        $riwayat = collect();

        if ($nis) {
            $siswa = Siswa::find($nis);

            if ($siswa) {
                $riwayat = InputAspirasi::with(['kategori', 'aspirasi'])
                    ->where('nis', $nis)
                    ->latest()
                    ->get();
            }
        }

        return view('siswa.aspirasi', compact('kategoris', 'nis', 'siswa', 'riwayat'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nis' => 'required|integer|min:1',
            'kelas' => 'required|string|max:10',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'lokasi' => 'required|string|max:50',
            'ket' => 'required|string|max:50',
        ]);

        // NIS baru otomatis didaftarkan; NIS yang sudah ada tidak diubah
        Siswa::firstOrCreate(
            ['nis' => $data['nis']],
            ['kelas' => $data['kelas']]
        );

        InputAspirasi::create([
            'nis' => $data['nis'],
            'id_kategori' => $data['id_kategori'],
            'lokasi' => $data['lokasi'],
            'ket' => $data['ket'],
        ]);

        return redirect()
            ->route('siswa.index', ['nis' => $data['nis']])
            ->with('sukses', 'Aspirasi berhasil dikirim.');
    }
}