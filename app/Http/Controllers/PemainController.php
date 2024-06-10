<?php

namespace App\Http\Controllers;

use App\Models\pemain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller;


class PemainController extends Controller
{
    public function index()
    {
        $pemain = pemain::all();
        return view('pemain.pemain', compact('pemain'));
    }

    public function create()
    {
        return view('pemain.addData');
    }

    public function store(Request $request)
    {
       $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'tier' => 'required',
            'game_main' => 'required',
            'device' => 'required',
        ]);


        pemain::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tier' => $request->tier,
            'game_main' => $request->game_main,
            'device' => $request->device,
        ]);

        return redirect('/pemain');
    }

    // Menampilkan form ubah pemain
    public function ubah($id_pemain)
    {
        // Mencari data pemain berdasarkan id
        $pemain = Pemain::findOrFail($id_pemain);

        // Mengirim data pemain ke view
        return view('pemain.ubah', compact('pemain'));
    }

    // Memperbarui data pemain
    public function update(Request $request, $id_pemain)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'tier' => 'required',
            'game_main' => 'required',
            'device' => 'required',
        ]);

        // Mencari data pemain berdasarkan id
        $pemain = Pemain::findOrFail($id_pemain);

        // Memperbarui data pemain
        $pemain->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tier' => $request->tier,
            'game_main' => $request->game_main,
            'device' => $request->device,
        ]);

        // Mengarahkan kembali ke halaman daftar pemain dengan pesan sukses
        return redirect('/pemain')->with('success', 'Data pemain berhasil diperbarui!');
    }

    public function destroy($id_pemain)
    {
        $pemain = Pemain::findOrFail($id_pemain);
        $pemain->delete();

        return redirect('/pemain')->with('success', 'Data pemain berhasil dihapus!');
    }

}
