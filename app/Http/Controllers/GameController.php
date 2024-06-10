<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GameController extends Controller
{
    public function index()
    {
        $game = game::all();

        return view('games.games', compact('games'));
    }
    public function cetak()
    {
        $transaction = game::all();
        $pdf = Pdf::loadview('transaction.transaction-cetak', compact('transaction'));
        return $pdf->download('laporan-transaksi.pdf');
    }


}
