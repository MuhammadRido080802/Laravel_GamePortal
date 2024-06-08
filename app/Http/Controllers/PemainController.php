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

    public function ubah($id_pemain)
    {
        $pemain = pemain::find($id_pemain);
        return view('pemain.ubah', compact('pemain'));
    }

    public function update(Request $request, $id_pemain)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'tier' => 'required',
            'game_main' => 'required',
            'device' => 'required',
        ]);

        $pemain = pemain::find($id_pemain);


        $pemain->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tier' => $request->tier,
            'game_main' => $request->game_main,
            'device' => $request->device,
        ]);

        return redirect('/pemain');
    }

    public function hapus($id_pemain)
    {
        $category = pemain::find($id_pemain);
        return view('pemain.hapus', compact('pemain'));
    }

}
