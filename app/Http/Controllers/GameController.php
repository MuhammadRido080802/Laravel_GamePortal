<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('game.game', compact('game'));

    }
    
    public function cetak()
    {
        $transaction = game::all();
        $pdf = Pdf::loadview('game.game-cetak', compact('game'));
        return $pdf->download('laporan-game.pdf');
    }


}
