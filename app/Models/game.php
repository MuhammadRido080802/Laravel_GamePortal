<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = ['nama_game', 'nama_pemain', 'tanggal', 'pemain_id', 'platform', 'ulasan'];
   
    public function pemain()
    {
        return $this->belongsTo(pemain::class, 'pemain_id', 'id_pemain');
    }

}
