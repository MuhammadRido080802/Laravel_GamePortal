<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        // Middleware auth untuk memastikan pengguna terautentikasi
        $this->middleware('auth');

        // Mengambil jumlah data dari tabel pemain
        $jumlahPemain = DB::table('pemain')->count();

        // Mengambil jumlah data dari tabel game
        $jumlahGame = DB::table('games')->count();

        // Mendapatkan data untuk grafik
        $dataGrafik = [
            ['label' => 'Pemain', 'value' => $jumlahPemain],
            ['label' => 'Game', 'value' => $jumlahGame]
        ];

        // Mengkonversi data ke format JSON untuk digunakan dalam grafik JavaScript
        $dataGrafikJSON = json_encode($dataGrafik);

        return view('welcome', compact('jumlahPemain', 'jumlahGame', 'dataGrafikJSON'));
    }

}
