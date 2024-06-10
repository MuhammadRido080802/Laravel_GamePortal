<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemain extends Model
{
    use HasFactory;
    protected $table = 'pemain';
    protected $primaryKey = 'id_pemain';
    public $incrementing = true;
    protected $fillable = ['nama', 'nip', 'tier','game_main','device'];
    public $timestamps = false;
    public function game()
{
    return $this->hasMany(game::class, 'pemain_id', 'id_pemain');
}
}



